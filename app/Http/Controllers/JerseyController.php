<?php

namespace App\Http\Controllers;

use App\Models\Jersey;
use Illuminate\Http\Request;

class JerseyController extends Controller
{
    // GET ALL
    public function index(Request $request)
    {
        $limit = max(1, min((int) $request->query('limit', 10), 100));
        $orderBy = $request->query('orderBy', 'id');
        $sortBy = strtolower($request->query('sortBy', 'asc')) === 'desc' ? 'desc' : 'asc';
        $search = trim((string) $request->query('search', ''));

        $allowed = ['id','nama','kategori','harga','stok','ukuran','created_at','updated_at'];
        if (!in_array($orderBy, $allowed)) {
            $orderBy = 'id';
        }

        $query = Jersey::query();

        if ($search !== '') {
            $query->where('nama', 'like', "%$search%")
                  ->orWhere('kategori', 'like', "%$search%");
        }

        $data = $query->orderBy($orderBy, $sortBy)->paginate($limit);

        return response()->json([
            'status' => 'success',
            'data' => $data->items(),
            'total' => $data->total(),
            'page' => $data->currentPage()
        ]);
    }

    // DETAIL
    public function show($id)
    {
        return response()->json(Jersey::findOrFail($id));
    }

    // CREATE
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string',
            'kategori'  => 'required|string',
            'harga'     => 'required|integer',
            'stok'      => 'required|integer',
            'ukuran'    => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable',
        ]);

        Jersey::create($data);

        return response()->json(['message' => 'Jersey berhasil ditambahkan'], 201);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $jersey = Jersey::findOrFail($id);

        $data = $request->validate([
            'nama'      => 'sometimes|string',
            'kategori'  => 'sometimes|string',
            'harga'     => 'sometimes|integer',
            'stok'      => 'sometimes|integer',
            'ukuran'    => 'sometimes|string',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable',
        ]);

        $jersey->update($data);

        return response()->json(['message' => 'Jersey berhasil diperbarui']);
    }

    // DELETE
    public function destroy($id)
    {
        Jersey::destroy($id);
        return response()->json(['message' => 'Jersey berhasil dihapus']);
    }
}
