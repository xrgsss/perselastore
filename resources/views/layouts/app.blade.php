<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Persela Store')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center">
    <div class="font-bold text-xl">
        <a href="/" class="hover:text-blue-400">Persela Store</a>
    </div>

    <div class="space-x-4 flex items-center">
        <a href="/" class="hover:text-blue-400">Beranda</a>
        <a href="/produk" class="hover:text-blue-400">Produk</a>
        <a href="/cart" class="hover:text-blue-400">Keranjang</a>
        <a href="/kontak" class="hover:text-blue-400">Kontak</a>

        <!-- AUTH MENU -->
        <span id="authMenu"></span>
    </div>
</nav>

<!-- CONTENT -->
<main class="p-6">
    @yield('content')
</main>

<!-- AUTH SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const authMenu = document.getElementById('authMenu');
    const token = localStorage.getItem('token');

    if (token) {
        authMenu.innerHTML = `
            <a href="/dashboard"
               class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">
               Dashboard
            </a>
            <button onclick="logout()"
               class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded ml-2">
               Logout
            </button>
        `;
    } else {
        authMenu.innerHTML = `
            <a href="/login"
               class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded">
               Login
            </a>
        `;
    }
});

function logout() {
    localStorage.removeItem('token');
    window.location.href = '/login';
}
</script>

</body>
</html>
