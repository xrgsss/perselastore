@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<section class="flex flex-col md:flex-row items-center justify-between bg-gray-900 text-white p-10 rounded-lg">
    <div class="max-w-xl">
        <h1 class="text-4xl font-bold mb-4">
            Selamat Datang di Persela Store
        </h1>
        <p class="mb-6 text-gray-300">
            Dukung Laskar Joko Tingkir dengan koleksi jersey resmi Persela Lamongan.
        </p>
        <a href="{{ route('frontend.produk') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded font-semibold">
            Lihat Semua Produk
        </a>
    </div>

    <div class="mt-8 md:mt-0">
        <img
            src="https://down-id.img.susercontent.com/file/id-11134207-7r98o-lkuvtj32elncb8@resize_w900_nl.webp"
            alt="Jersey Persela"
            class="w-80 rounded shadow-lg"
        >
    </div>
</section>

<section class="mt-12">
    <h2 class="text-2xl font-bold text-center mb-6">
        Produk Unggulan
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded shadow p-4 text-center">
            <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98o-lkuvtj32elncb8@resize_w300_nl.webp"
                 class="mx-auto mb-4 rounded">
            <h3 class="font-semibold">Jersey Home</h3>
        </div>

        <div class="bg-white rounded shadow p-4 text-center">
            <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98o-lkuvtj32elncb8@resize_w300_nl.webp"
                 class="mx-auto mb-4 rounded">
            <h3 class="font-semibold">Jersey Away</h3>
        </div>

        <div class="bg-white rounded shadow p-4 text-center">
            <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98o-lkuvtj32elncb8@resize_w300_nl.webp"
                 class="mx-auto mb-4 rounded">
            <h3 class="font-semibold">Jersey Training</h3>
        </div>
    </div>
</section>

@endsection
