<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Persela Store</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
  <header class="navbar">
    <div class="logo">Persela Store</div>
    <nav>
      <a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">Beranda</a>
      <a href="{{ route('frontend.tentang') }}" class="{{ request()->routeIs('frontend.tentang') ? 'active' : '' }}">Tentang</a>
      <a href="{{ route('frontend.produk') }}" class="{{ request()->routeIs('frontend.produk') ? 'active' : '' }}">Produk</a>
      <a href="{{ route('frontend.kontak') }}" class="{{ request()->routeIs('frontend.kontak') ? 'active' : '' }}">Kontak</a>
      <a href="{{ route('frontend.bantuan') }}" class="{{ request()->routeIs('frontend.bantuan') ? 'active' : '' }}">Bantuan</a>
      <a href="{{ route('frontend.cart') }}" class="{{ request()->routeIs('frontend.cart') ? 'active' : '' }}">Keranjang</a>
    </nav>
  </header>

  <section class="bantuan-section">
    <h1>Tentang Kami</h1>
    <p><strong>Persela Store</strong> adalah toko resmi yang menjual merchandise klub sepak bola Persela Lamongan. Kami berkomitmen menyediakan produk berkualitas tinggi untuk para penggemar setia Laskar Joko Tingkir.</p>
    <p>Visi kami adalah menjadi pusat merchandise klub sepak bola terbaik di Indonesia, membawa semangat biru Lamongan ke seluruh penjuru negeri!</p>
  </section>

  <footer>
    <p>(c) 2025 Persela Store.</p>
  </footer>
</body>
</html>
