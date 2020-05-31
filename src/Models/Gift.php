<?php

namespace HeurekaFeed\Models;

class Gift implements \JsonSerializable
{
    /**
     * @var string 
     */
    protected $name;
    /**
     * @var string|null 
     */
    protected $id;

    /**
     * Gift constructor.
     *
     * @param string      $name
     * @param string|null $id
     */
    public function __construct(string $name, ?string $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @param  array $array
     * @return Gift
     */
    public static function createFromArray(array $array): Gift
    {
        return new static($array['name'], array_key_exists('id', $array) ? $array['id'] : null);
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'id' => $this->id,
        ];
    }
}