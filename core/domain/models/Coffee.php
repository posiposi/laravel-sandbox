<?php

namespace core\domain\models;

use Exception;

class Coffee
{
    private string $type;
    private float $price;
    private float $caffeinePercentage;

    private function __construct(string $type, float $price, float $caffeinePercentage)
    {
        if ($type !== 'Espresso') {
            throw new \Exception("Invalid coffee type: $type");
        }
        $this->type = $type;
        $this->price = $price;
        $this->caffeinePercentage = $caffeinePercentage;
    }

    public static function from(string $type, float $price, float $caffeinePercentage = 0.0): self
    {
        return new self($type, $price, $caffeinePercentage);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCaffeinePercentage(): float
    {
        return $this->caffeinePercentage;
    }
}
