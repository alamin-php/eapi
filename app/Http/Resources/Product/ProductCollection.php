<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'data'=>$this->collection->transform(function($product){
            return[
                'name'=>$product->name,
                'stock'=>$product->stock==0 ? 'Out of Stock' : $product->stock,
                'totalPrice'=>round((1- ($product->discount/100))*$product->price,2),
                'rating'=>$product->reviews->count()>0 ? round($product->reviews->sum('star')/$product->reviews->count(),2) : 'No rating yet',
                'discount'=>$product->discount,
                'href'=>[
                    'link'=>route('products.show',$product->id)
                ]
            ];
        })
        ];
    }
}
