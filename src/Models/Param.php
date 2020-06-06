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

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'val' => $this->val,
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getVal(): string
    {
        return $this->val;
    }
}