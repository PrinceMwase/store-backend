<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->price,
            'category' =>$this->category,
            'store' => $this->store->name,
            'status' => $this->status,
            'photo' => $this->photo,
            'Photos' => $this->photos,
            'created_at' => $this->created_at,
            'description' =>  $this->description,
            'updated_at' => $this->updated_at,
        ];
    }
}
