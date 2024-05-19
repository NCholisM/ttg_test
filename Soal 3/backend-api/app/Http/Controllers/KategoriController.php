<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::orderBy('id_kategori', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Kategori',
            'data'    => $kategoris
        ], 200);
    }

    public function show($id_kategori)
    {
        $kategori = Kategori::findOrfail($id_kategori);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori not found',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kategori',
            'data'    => $kategori
        ], 200);
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama_kategori' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $kategori = Kategori::create($request->all());

    //     return response()->json([
    //         'success' => $kategori ? true : false,
    //         'message' => $kategori ? 'Kategori Created' : 'Kategori Failed to Save',
    //         'data'    => $kategori
    //     ], $kategori ? 201 : 409);
    // }

    // public function update(Request $request, Kategori $kategori)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama_kategori' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $kategori->update($request->all());

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Kategori Updated',
    //         'data'    => $kategori
    //     ], 200);
    // }

    // public function destroy($id_kategori)
    // {
    //     $kategori = Kategori::findOrfail($id_kategori);

    //     if ($kategori) {
    //         $kategori->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Kategori Deleted',
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Kategori Not Found',
    //     ], 404);
    // }
}
