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

        $allowedOrderColumns = ['id', 'nama', 'kategori', 'harga', 'stok', 'ukuran', 'created_at', 'updated_at'];
        if (!in_array($orderBy, $allowedOrderColumns, true)) {
            $orderBy = 'id';
        }

        $query = Jersey::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        $paginator = $query
            ->orderBy($orderBy, $sortBy)
            ->paginate($limit);

        return response()->json([
            'status' => 'success',
            'page' => $paginator->currentPage(),
            'limit' => $paginator->perPage(),
            'total' => $paginator->total(),
            'data' => $paginator->items(),
        ]);
    }

    // GET DETAIL
    public function show($id)
    {
        $jersey = Jersey::findOrFail($id);
        return response()->json($jersey);
    }

    // CREATE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string',
            'kategori'  => 'required|string',
            'harga'     => 'required|integer',
            'stok'      => 'required|integer',
            'ukuran'    => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable',
        ]);

        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'image|max:5120']);
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/jerseys', $filename);
            $validated['gambar'] = $filename;
        } elseif ($request->filled('gambar')) {
            $validated['gambar'] = (string) $request->input('gambar');
        }

        Jersey::create($validated);

        return response()->json([
            'message' => 'Jersey berhasil ditambahkan'
        ], 201);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $jersey = Jersey::findOrFail($id);

        $data = $request->validate([
            'nama'      => 'sometimes|required|string',
            'kategori'  => 'sometimes|required|string',
            'harga'     => 'sometimes|required|integer',
            'stok'      => 'sometimes|required|integer',
            'ukuran'    => 'sometimes|required|string',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable',
        ]);

        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'image|max:5120']);
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/jerseys', $filename);
            $data['gambar'] = $filename;
        } elseif ($request->filled('gambar')) {
            $data['gambar'] = (string) $request->input('gambar');
        }

        $jersey->update($data);

        return response()->json([
            'message' => 'Jersey berhasil diperbarui'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Jersey::destroy($id);

        return response()->json([
            'message' => 'Jersey berhasil dihapus'
        ]);
    }
}
