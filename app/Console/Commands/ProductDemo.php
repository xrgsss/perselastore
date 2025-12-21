<?php

namespace App\Console\Commands;

use App\Domain\Products\ClothingProduct;
use App\Domain\Products\DigitalProduct;
use Illuminate\Console\Command;

class ProductDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tampilkan contoh katalog produk sederhana';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->line('===== PROGRAM PENJUALAN TOKO =====');
        $this->newLine();

        $product1 = new ClothingProduct('Jersey Persela Home 2024', 250000, 'L', 12);
        $this->line('1. Membuat Product:');
        $this->line($product1->getInfo());
        $this->newLine();

        $ebook = new DigitalProduct(
            'Ebook Strategi Sepak Bola',
            50000,
            'https://example.com/ebook'
        );
        $this->line('2. Produk Digital (Inheritance):');
        $this->line($ebook->getInfo());
        $this->newLine();

        $product2 = new ClothingProduct('Jersey Persela Away 2024', 255000, 'M', 8);
        $products = [$product1, $ebook, $product2];

        $this->line('===== DAFTAR PRODUK =====');
        $this->newLine();

        foreach ($products as $index => $product) {
            $number = $index + 1;
            $this->line("{$number}. " . $product->getInfo());
        }

        $this->newLine();
        $this->line('Total Produk: ' . count($products));

        return self::SUCCESS;
    }
}
