<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\TokoBaju;
use App\Http\Resources\TokoBajuResource;

class TokoBajuController extends BaseController
{
   public function index()
   {
      $tokobaju = TokoBaju::all();

      return $this->sendResponse(TokoBajuResource::collection($tokobaju), 'Baju berhasil ditampilkan.');
   }

   public function create(Request $request)
   {
      $input = $request->all();
      $validator = Validator::make($input, [
         'nama_baju' => 'required',
         'nama_brand' => 'required',
         'stok' => 're  quired',
         'harga' => 'required',
      ]);

      if ($validator->fails()) {
         return $this->sendError('Validation Error.', $validator->errors()->toArray());
      }

      $tokobaju = TokoBaju::create($input);
      return $this->sendResponse(new TokoBajuResource($tokobaju), 'Data baju berhasil ditambahkan.');
   }

   public function show($id)
   {
      $tokobaju = TokoBaju::find($id);

      if (is_null($tokobaju)) {
         return $this->sendError('Baju tidak ditemukan.');
      }

      return $this->sendResponse(new TokoBajuResource($tokobaju), 'Data Baju berhasil ditampilkan.');
   }

   public function update(Request $request, TokoBaju $tokobaju)
   {
      $input = $request->all();
      $validator = Validator::make($input, [
         'nama_baju' => 'required',
         'nama_brand' => 'required',
         'stok' => 'required',
         'harga' => 'required',
      ]);

      if ($validator->fails()) {
         return $this->sendError('Validation Error.', $validator->errors()->toArray());
      }

      $tokobaju->nama_baju = $input['nama_baju'];
      $tokobaju->nama_brand = $input['nama_brand'];
      $tokobaju->stok = $input['stok'];
      $tokobaju->harga = $input['harga'];
      $tokobaju->save();

      return $this->sendResponse(new TokoBajuResource($tokobaju), 'Data Baju berhasil diupdate.');
   }

   public function remove(TokoBaju $tokobaju)
   {
      $tokobaju->delete();

      return $this->sendResponse([], 'Data Baju berhasil dihapus.');
   }
}
