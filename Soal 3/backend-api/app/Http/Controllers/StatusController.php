<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function index()
    {
        $statuss = Status::orderBy('id_status', 'asc')->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Status',
            'data'    => $statuss
        ], 200);
    }

    public function show($id_status)
    {
        $status = Status::findOrfail($id_status);

        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => 'Status not found',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Status',
            'data'    => $status
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

    //     $status = Status::create($request->all());

    //     return response()->json([
    //         'success' => $status ? true : false,
    //         'message' => $status ? 'Status Created' : 'Status Failed to Save',
    //         'data'    => $status
    //     ], $status ? 201 : 409);
    // }

    // public function update(Request $request, Status $status)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama_kategori' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $status->update($request->all());

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Status Updated',
    //         'data'    => $status
    //     ], 200);
    // }

    // public function destroy($id_status)
    // {
    //     $status = Status::findOrfail($id_status);

    //     if ($status) {
    //         $status->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Status Deleted',
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Status Not Found',
    //     ], 404);
    // }
}
