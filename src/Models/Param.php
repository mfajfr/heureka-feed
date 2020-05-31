<?php

namespace HeurekaFeed\Models;

class Param implements \JsonSerializable
{
    /**
     * @var string 
     */
    protected $name;
    /**
     * @var string 
     */
    protected $val;

    /**
     * Param constructor.
     *
     * @param string $name
     * @param string $val
     */
    public function __construct(string $name, string $val)
    {
        $this->name = $name;
        $this->val = $val;
    }

    /**
     * @param  array $array
     * @return static
     */
    public static function createFromArray(array $array): Param
    {
        return new static($array['name'], $array['val']);
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'val' => $this->val,
        ];
    }
}