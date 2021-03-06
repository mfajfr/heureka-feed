<?php

namespace HeurekaFeed;

use Cocur\Slugify\Slugify;
use HeurekaFeed\Models\Delivery;
use HeurekaFeed\Models\Gift;
use HeurekaFeed\Models\Param;
use HeurekaFeed\Models\ShopItem;
use HeurekaFeed\Models\Shop;

class Reader
{
    /**
     * @var \XMLReader 
     */
    protected $xml;

    /**
     * @var Slugify
     */
    protected $slugify;

    /**
     * Reader constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->slugify = new Slugify();
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
    public function loadShopItem(): ?ShopItem
    {
        if ($this->xml->name != 'SHOPITEM') {
            return null;
        }

        $shopitem = new \SimpleXMLElement($this->xml->readOuterXml());

        $params = [];
        foreach ($shopitem->PARAM as $param) {
            $params[$this->slugify->slugify($param->PARAM_NAME)] = new Param($param->PARAM_NAME, $param->VAL);
        }

        $deliveries = [];
        foreach ($shopitem->DELIVERY as $delivery) {
            $deliveries[$this->slugify->slugify($delivery->DELIVERY_ID)] = new Delivery(
                $delivery->DELIVERY_ID,
                floatval($delivery->DELIVERY_PRICE),
                floatval($delivery->DELIVERY_PRICE_COD)
            );
        }

//        $gift = null;
//        if (array_key_exists('GIFT', $shopitem)) {
//            $gift = new Gift($shopitem->GIFT, $shopitem->GIFT->attributes('id'));
//        }

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
            floatval($shopitem->PRICE),
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
            intval($shopitem->STOCK),
            $shopitem->UNIT
        );
    }

    public function next()
    {
        return $this->xml->next('SHOPITEM');
    }
}