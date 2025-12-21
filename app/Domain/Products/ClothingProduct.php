<?php

namespace App\Domain\Products;

class ClothingProduct extends Product
{
    private string $size;
    private int $stock;

    public function __construct(string $name, int $price, string $size, int $stock)
    {
        parent::__construct($name, 'Clothing', $price);
        $this->size = $size;
        $this->stock = $stock;
    }

    public function getInfo(): string
    {
        return parent::getInfo() .
            " | Ukuran: {$this->size} | Stock: {$this->stock}";
    }
}
