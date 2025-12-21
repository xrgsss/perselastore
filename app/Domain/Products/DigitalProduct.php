<?php

namespace App\Domain\Products;

class DigitalProduct extends Product
{
    private string $downloadLink;
    private int $limit;

    public function __construct(string $name, int $price, string $downloadLink, int $limit = 3)
    {
        parent::__construct($name, 'Digital', $price);
        $this->downloadLink = $downloadLink;
        $this->limit = $limit;
    }

    public function getInfo(): string
    {
        return parent::getInfo() .
            " | Link Download: {$this->downloadLink} (Limit: {$this->limit}x)";
    }
}
