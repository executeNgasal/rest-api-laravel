<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokoBajuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "nama_baju" => $this->nama_baju,
            "nama_brand" => $this->nama_brand,
            "stok" => $this->stok,
            "harga" => $this->harga,
        ];
    }
}
