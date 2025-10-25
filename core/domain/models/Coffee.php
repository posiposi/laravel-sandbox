<?php

namespace core\domain\models;

use Exception;

class Coffee
{
    private string $type;
    private float $price;

    private function __construct(string $type, float $price)
    {
        if ($type !== 'Espresso') {
            throw new \Exception("Invalid coffee type: $type");
        }
        $this->type = $type;
        $this->price = $price;
    }

    public static function from(string $type, float $price): self
    {
        return new self($type, $price);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
