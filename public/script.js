document.addEventListener("DOMContentLoaded", () => {
  const produkContainer = document.getElementById("produk-container");
  const unggulanContainer = document.getElementById("unggulan-container");
  const cartContainer = document.getElementById("cart-container");
  const DATA_URL = "/data.json";
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // Ambil data produk
  fetch(DATA_URL)
    .then(res => res.json())
    .then(data => {
      if (produkContainer) {
        tampilkanProduk(produkContainer, data);
      }

      if (unggulanContainer) {
        tampilkanProduk(unggulanContainer, data.slice(0, 3));
      }
    })
    .catch(err => console.error("Gagal mengambil data:", err));

  // Render produk
  function tampilkanProduk(container, data) {
    container.innerHTML = data
      .map((p, i) => `
      <div class="produk-card">
        <img src="${p.gambar}" alt="${p.nama}">
        <h4>${p.nama}</h4>
        <p>${p.harga}</p>
        <button onclick="tambahKeranjang(${i})">Tambah ke Keranjang</button>
      </div>
    `)
      .join("");
  }

  // Keranjang: tambah
  window.tambahKeranjang = (index) => {
    fetch(DATA_URL)
      .then(res => res.json())
      .then(data => {
        const produk = data[index];
        cart.push(produk);
        localStorage.setItem("cart", JSON.stringify(cart));
        alert(`${produk.nama} berhasil ditambahkan ke keranjang!`);
      });
  };

  // Render keranjang
  if (cartContainer) {
    renderKeranjang();
  }

  function renderKeranjang() {
    if (cart.length === 0) {
      cartContainer.innerHTML = "<p>Keranjang masih kosong.</p>";
      return;
    }

    cartContainer.innerHTML = cart
      .map((item, i) => `
      <div class="produk-card">
        <img src="${item.gambar}" alt="${item.nama}">
        <h4>${item.nama}</h4>
        <p>${item.harga}</p>
        <button onclick="hapusKeranjang(${i})">Hapus</button>
      </div>
    `)
      .join("");
  }

  // Keranjang: hapus
  window.hapusKeranjang = (i) => {
    cart.splice(i, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderKeranjang();
  };
});
