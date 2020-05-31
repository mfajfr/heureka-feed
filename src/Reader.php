<?php

namespace HeurekaFeed;

use HeurekaFeed\Models\Delivery;
use HeurekaFeed\Models\Gift;
use HeurekaFeed\Models\Param;
use HeurekaFeed\Models\ShopItem;
use HeurekaFeed\Shop\Shop;

class Reader
{
    /**
     * @var \XMLReader 
     */
    protected $xml;

    /**
     * Reader constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->xml = new \XMLReader();
        $this->xml->open($url);
        while ($this->xml->read() && $this->xml->name != 'SHOPITEM') { 
        }
    }

    /**
     * @return Shop
     */
    public function loadShop(): Shop
    {
        $shop = new Shop();

        while($this->xml->name == 'SHOPITEM') {
            $shop->addShopItem($this->loadShopItem());
            $this->next();
        }

        return $shop;
    }

    /**
     * @return ShopItem
     */
    public function loadShopItem(): ShopItem
    {
        $shopitem = new \SimpleXMLElement($this->xml->readOuterXml());

        $params = [];
        foreach ($shopitem->PARAM as $param) {
            $params[] = new Param($param->PARAM_NAME, $param->VAL);
        }

        $deliveries = [];
        foreach ($shopitem->DELIVERY as $delivery) {
            $deliveries[] = new Delivery(
                $delivery->DELIVERY_ID,
                $delivery->DELIVERY_PRICE,
                $delivery->DELIVERY_PRICE_COD
            );
        }

        $gift = null;
        if (array_key_exists('GIFT', $shopitem)) {
            $gift = new Gift($shopitem->GIFT, $shopitem->GIFT->attributes('id'));
        }

        return new ShopItem(
            $shopitem->ITEM_ID,
            $shopitem->PRODUCTNAME,
            $shopitem->PRODUCT,
            $shopitem->DESCRIPTION,
            $shopitem->URL,
            $shopitem->IMGURL,
            $shopitem->IMGURL_ALTERNATIVE,
            $shopitem->VIDEO_URL,
            floatval($shopitem->PRICE_VAT),
            $shopitem->VAT,
            floatval($shopitem->HEUREKA_CPC),
            $shopitem->MANUFACTURER,
            $shopitem->CATEGORY_TEXT,
            $shopitem->EAN,
            $shopitem->PRODUCTNO,
            $params,
            intval($shopitem->DELIVERY_DATE),
            $deliveries,
            $shopitem->ITEM_TYPE,
            $shopitem->ISBN,
            $shopitem->ITEMGROUP_ID,
            $shopitem->ACCESSORY,
            $gift
        );
    }

    public function next()
    {
        $this->xml->next('SHOPITEM');
    }
}