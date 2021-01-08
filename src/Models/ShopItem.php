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
     * @var float
     */
    protected $price;
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
     * @var int
     */
    protected $stock;
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
     * @param float      $price
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
     * @param int        $stock
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
        float $price,
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
        int $stock,
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
        $this->price = $price;
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
        $this->stock = $stock;
        $this->gift = $gift;
    }

    public function jsonSerialize()
    {
        $deliveries = [];
        foreach ($this->deliveries as $delivery) {
            $deliveries[] = $delivery->jsonSerialize();
        }

        $params = [];
        foreach ($this->params as $param) {
            $params[] = $param->jsonSerialize();
        }

        return [
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
            'params' => $params,
            'deliveries' => $deliveries,
            'stock' => $this->stock,
            'gift' => $this->gift ? $this->gift->jsonSerialize() : null,
        ];
    }

    /**
     * @return string
     */
    public function getItemId(): string
    {
        return $this->itemId;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    /**
     * @return string
     */
    public function getImgUrlAlternative(): string
    {
        return $this->imgUrlAlternative;
    }

    /**
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    /**
     * @return float
     */
    public function getPriceVat(): float
    {
        return $this->priceVat;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getVat(): string
    {
        return $this->vat;
    }

    /**
     * @return float
     */
    public function getHeurekaCpc(): float
    {
        return $this->heurekaCpc;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @return string
     */
    public function getCategoryText(): string
    {
        return $this->categoryText;
    }

    /**
     * @return string
     */
    public function getEan(): string
    {
        return $this->ean;
    }

    /**
     * @return string
     */
    public function getProductNo(): string
    {
        return $this->productNo;
    }

    /**
     * @return Param[]
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return int
     */
    public function getDeliveryDate(): int
    {
        return $this->deliveryDate;
    }

    /**
     * @return Delivery[]
     */
    public function getDeliveries(): array
    {
        return $this->deliveries;
    }

    /**
     * @return string
     */
    public function getItemType(): string
    {
        return $this->itemType;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getItemGroupId(): string
    {
        return $this->itemGroupId;
    }

    /**
     * @return string
     */
    public function getAccessory(): string
    {
        return $this->accessory;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @return Gift|null
     */
    public function getGift(): ?Gift
    {
        return $this->gift;
    }
}