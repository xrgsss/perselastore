<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Persela Store')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-gray-900 text-white px-6 py-4 flex justify-between">
    <div class="font-bold text-xl">Persela Store</div>

    <div class="space-x-4">
        <a href="/" class="hover:underline">Beranda</a>
        <a href="/produk" class="hover:underline">Produk</a>

        <span id="guest-menu">
            <a href="/login" class="bg-blue-600 px-3 py-1 rounded">Login</a>
        </span>

        <span id="auth-menu" class="hidden">
            <a href="/dashboard" class="hover:underline">Dashboard</a>
            <button onclick="logout()" class="bg-red-600 px-3 py-1 rounded">
                Logout
            </button>
        </span>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script>
const token = localStorage.getItem('token');

if (token) {
    document.getElementById('guest-menu')?.classList.add('hidden');
    document.getElementById('auth-menu')?.classList.remove('hidden');
}

function logout() {
    fetch('/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }).finally(() => {
        localStorage.removeItem('token');
        location.href = '/login';
    });
}
</script>

</body>
</html>
