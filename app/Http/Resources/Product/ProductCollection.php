<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'totalPrice' => $this->price - $this->discount,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(0),2) : 'No rating yet',
            'href' => [
                'product'=>route('products.show',$this->id)
            ]

        ];
    }
}
