<?php

namespace HeurekaFeed\Models;

class ShopItem implements \JsonSerializable
{
    /**
     * @var string 
     */
    protected $itemId;
    /**
     * @var string 
     */
    protected $productName;
    /**
     * @var string 
     */
    protected $product;
    /**
     * @var string 
     */
    protected $description;
    /**
     * @var string 
     */
    protected $url;
    /**
     * @var string 
     */
    protected $imgUrl;
    /**
     * @var string 
     */
    protected $imgUrlAlternative;
    /**
     * @var string 
     */
    protected $videoUrl;
    /**
     * @var float 
     */
    protected $priceVat;
    /**
     * @var string 
     */
    protected $vat;
    /**
     * @var float 
     */
    protected $heurekaCpc;
    /**
     * @var string 
     */
    protected $manufacturer;
    /**
     * @var string 
     */
    protected $categoryText;
    /**
     * @var string 
     */
    protected $ean;
    /**
     * @var string 
     */
    protected $productNo;
    /**
     * @var Param[] 
     */
    protected $params = [];
    /**
     * @var int 
     */
    protected $deliveryDate;
    /**
     * @var Delivery[] 
     */
    protected $deliveries = [];
    /**
     * @var string 
     */
    protected $itemType;
    /**
     * @var string 
     */
    protected $isbn;
    /**
     * @var string 
     */
    protected $itemGroupId;
    /**
     * @var string 
     */
    protected $accessory;
    /**
     * @var Gift|null 
     */
    protected $gift;

    /**
     * ShopItem constructor.
     *
     * @param string     $itemId
     * @param string     $productName
     * @param string     $product
     * @param string     $description
     * @param string     $url
     * @param string     $imgUrl
     * @param string     $imgUrlAlternative
     * @param string     $videoUrl
     * @param float      $priceVat
     * @param string     $vat
     * @param float      $heurekaCpc
     * @param string     $manufacturer
     * @param string     $categoryText
     * @param string     $ean
     * @param string     $productNo
     * @param Param[]    $params
     * @param int        $deliveryDate
     * @param Delivery[] $deliveries
     * @param string     $itemType
     * @param string     $isbn
     * @param string     $itemGroupId
     * @param string     $accessory
     * @param Gift|null  $gift
     */
    public function __construct(
        string $itemId,
        string $productName,
        string $product,
        string $description,
        string $url,
        string $imgUrl,
        string $imgUrlAlternative,
        string $videoUrl,
        float $priceVat,
        string $vat,
        float $heurekaCpc,
        string $manufacturer,
        string $categoryText,
        string $ean,
        string $productNo,
        array $params,
        int $deliveryDate,
        array $deliveries,
        string $itemType,
        string $isbn,
        string $itemGroupId,
        string $accessory,
        ?Gift $gift = null
    ) {
        $this->itemId = $itemId;
        $this->productName = $productName;
        $this->product = $product;
        $this->description = $description;
        $this->url = $url;
        $this->imgUrl = $imgUrl;
        $this->imgUrlAlternative = $imgUrlAlternative;
        $this->videoUrl = $videoUrl;
        $this->priceVat = $priceVat;
        $this->vat = $vat;
        $this->heurekaCpc = $heurekaCpc;
        $this->manufacturer = $manufacturer;
        $this->categoryText = $categoryText;
        $this->ean = $ean;
        $this->productNo = $productNo;
        $this->params = $params;
        $this->deliveryDate = $deliveryDate;
        $this->deliveries = $deliveries;
        $this->itemType = $itemType;
        $this->isbn = $isbn;
        $this->itemGroupId = $itemGroupId;
        $this->accessory = $accessory;
        $this->gift = $gift;
    }

    public function jsonSerialize()
    {
        $json = [
            'itemId' => $this->itemId,
            'productName' => $this->productName,
            'product' => $this->product,
            'description' => $this->description,
            'url' => $this->url,
            'imgUrl' => $this->imgUrl,
            'imgUrlAlternative' => $this->imgUrlAlternative,
            'videoUrl' => $this->videoUrl,
            'priceVat' => $this->priceVat,
            'vat' => $this->vat,
            'heurekaCpc' => $this->heurekaCpc,
            'manufacturer' => $this->manufacturer,
            'categoryText' => $this->categoryText,
            'ean' => $this->ean,
            'productNo' => $this->productNo,
            'deliveryDate' => $this->deliveryDate,
            'itemType' => $this->itemType,
            'isbn' => $this->isbn,
            'itemGroupId' => $this->itemGroupId,
            'accessory' => $this->accessory,
            'params' => [],
            'deliveries' =>[],
            'gift' => $this->gift ? $this->gift->jsonSerialize() : null,
        ];

        foreach ($this->deliveries as $delivery) {
            $json['deliveries'][] = $delivery->jsonSerialize();
        }

        foreach ($this->params as $param) {
            $json['params'][] = $param->jsonSerialize();
        }

        return $json;
    }
}