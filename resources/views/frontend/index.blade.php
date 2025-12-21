<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Persela Store | Beranda</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <script src="{{ asset('script.js') }}" defer></script>
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

  <section class="hero">
    <div class="hero-text">
      <h1>Selamat Datang di Persela Store</h1>
      <p>Dukung Laskar Joko Tingkir dengan koleksi jersey resmi Persela Lamongan.</p>
      <a href="{{ route('frontend.produk') }}" class="btn-primary">Lihat Semua Produk</a>
    </div>
    <div class="hero-image">
      <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98o-lkuvtj32elncb8@resize_w900_nl.webp" alt="Jersey Home Persela">
    </div>
  </section>

  <section class="produk-section">
    <h2>Produk Unggulan</h2>
    <div id="unggulan-container" class="produk-container"></div>
  </section>

  <footer>
    <p>(c) 2025 Persela Store. All rights reserved.</p>
  </footer>
</body>
</html>
