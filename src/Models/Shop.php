<?php

namespace HeurekaFeed\Models;

use HeurekaFeed\Models\ShopItem;

class Shop
{
    /**
     * @var ShopItem[] 
     */
    protected $shopItems = [];

    /**
     * Shop constructor.
     *
     * @param ShopItem[] $shopItems
     */
    public function __construct(array $shopItems = [])
    {
        $this->shopItems = $shopItems;
    }

    /**
     * @return ShopItem[]
     */
    public function getShopItems(): array
    {
        return $this->shopItems;
    }

    /**
     * Adding shopitem into array
     *
     * @param ShopItem $shopItem
     */
    public function addShopItem(ShopItem $shopItem): void
    {
        $this->shopItems[] = $shopItem;
    }
}