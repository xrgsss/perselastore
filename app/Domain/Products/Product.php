<?php

namespace App\Domain\Products;

class Product
{
    protected string $name;
    protected string $category;
    protected int $price;

    public function __construct(string $name, string $category, int $price)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }

    public function getInfo(): string
    {
        return "Produk: {$this->name} | Kategori: {$this->category} | Harga: Rp " .
            number_format($this->price, 0, ',', '.');
    }

    public function __toString(): string
    {
        return $this->getInfo();
    }
}
