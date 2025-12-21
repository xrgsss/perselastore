<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bantuan | Persela Store</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
  <header class="navbar">
    <div class="logo">Persela Store</div>
    <nav>
      <a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">Beranda</a>
      <a href="{{ route('frontend.produk') }}" class="{{ request()->routeIs('frontend.produk') ? 'active' : '' }}">Produk</a>
      <a href="{{ route('frontend.cart') }}" class="{{ request()->routeIs('frontend.cart') ? 'active' : '' }}">Keranjang</a>
      <a href="{{ route('frontend.kontak') }}" class="{{ request()->routeIs('frontend.kontak') ? 'active' : '' }}">Kontak</a>
      <a href="{{ route('frontend.bantuan') }}" class="{{ request()->routeIs('frontend.bantuan') ? 'active' : '' }}">Bantuan</a>
      <a href="{{ route('frontend.tentang') }}" class="{{ request()->routeIs('frontend.tentang') ? 'active' : '' }}">Tentang</a>
    </nav>
  </header>

  <section class="bantuan-section">
    <h1>Pusat Bantuan</h1>
    <p>Berikut beberapa pertanyaan yang sering ditanyakan:</p>
    <ul class="faq-list">
      <li><strong>Apakah jersey ini original?</strong><br>Ya, semua produk yang dijual di Persela Store adalah produk resmi.</li>
      <li><strong>Bagaimana cara pemesanan?</strong><br>Anda bisa memilih jersey di halaman Produk, lalu menambahkannya ke Keranjang.</li>
      <li><strong>Apakah tersedia pengiriman ke luar kota?</strong><br>Ya, kami melayani pengiriman ke seluruh Indonesia.</li>
      <li><strong>Apakah bisa COD?</strong><br>Ya, kami mendukung metode pembayaran COD di area tertentu.</li>
    </ul>
  </section>

  <footer>
    <p>(c) 2025 Persela Store. All rights reserved.</p>
  </footer>
</body>
</html>
