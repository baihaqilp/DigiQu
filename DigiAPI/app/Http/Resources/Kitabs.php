<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Kitabs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'kategori' => $this->kategori,
            'data' => [
                'id' => $this->id,
                'judul_kitab' => $this->judul_kitab, 
                'sampul' => $this->sampul,
                'link' => $this->link
            ]
        ];
    }
}
