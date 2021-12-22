<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'img' => url('/').'/storage/images/'.$this->img,
            'created_at' => $this->created_at,
            'category' => new CategoryResource($this->category),
            'productProperties' => new ProductPropertyResource($this->productProperties)
        ];
        //return parent::toArray($request);
    }
}
