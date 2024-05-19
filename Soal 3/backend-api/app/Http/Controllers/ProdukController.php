<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::join('kategori', 'produk.kategori_id', '=', 'kategori.id_kategori')
            ->join('status', 'produk.status_id', '=', 'status.id_status')
            ->select('produk.id_produk', 'produk.nama_produk', 'produk.harga', 'kategori.nama_kategori', 'status.nama_status')
            ->orderBy('produk.id_produk', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Produk',
            'data'    => $produks
        ], 200);
    }

    public function show($id_produk)
    {
        $produk = Produk::findOrfail($id_produk);

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk not found',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Produk',
            'data'    => $produk
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required',
            'status_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $produk = Produk::create($request->all());

        return response()->json([
            'success' => $produk ? true : false,
            'message' => $produk ? 'Produk Created' : 'Produk Failed to Save',
            'data'    => $produk
        ], $produk ? 201 : 409);
    }

    public function update(Request $request, Produk $produk)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required',
            'status_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $produk->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk Updated',
            'data'    => $produk
        ], 200);
    }

    public function destroy($id_produk)
    {
        $produk = Produk::findOrfail($id_produk);

        if ($produk) {
            $produk->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk Deleted',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Produk Not Found',
        ], 404);
    }
}
