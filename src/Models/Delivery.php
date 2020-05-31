<?php

namespace HeurekaFeed\Models;

class Delivery implements \JsonSerializable
{
    /**
     * @var string 
     */
    protected $id;
    /**
     * @var float 
     */
    protected $deliveryPrice;
    /**
     * @var float 
     */
    protected $deliveryPriceCod;

    /**
     * Delivery constructor.
     *
     * @param string $id
     * @param float  $deliveryPrice
     * @param float  $deliveryPriceCod
     */
    public function __construct(string $id, float $deliveryPrice, float $deliveryPriceCod)
    {
        $this->id = $id;
        $this->deliveryPrice = $deliveryPrice;
        $this->deliveryPriceCod = $deliveryPriceCod;
    }

    /**
     * @param  array $array
     * @return Delivery
     */
    public static function createFromArray(array $array): Delivery
    {
        return new static($array['id'], $array['deliveryPrice'], $array['deliveryPriceCod']);
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'deliveryPrice' => $this->deliveryPrice,
            'deliveryPriceCod' => $this->deliveryPriceCod,
        ];
    }
}