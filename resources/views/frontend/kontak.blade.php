<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Persela Store | Kontak</title>
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

  <section class="kontak-section">
    <h2>Hubungi Kami</h2>
    <p>Email: <a href="mailto:info@perselastore.com">info@perselastore.com</a></p>
    <p>Instagram: <a href="#">@perselastore</a></p>
    <p>Alamat Toko: Stadion Surajaya, Lamongan, Jawa Timur</p>
  </section>

  <footer>
    <p>(c) 2025 Persela Store. All rights reserved.</p>
  </footer>
</body>
</html>
