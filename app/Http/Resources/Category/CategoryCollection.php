<?php

namespace App\Http\Resources\Category;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        /**
         *! If Route = transactions.categories.index, 
         *      Request is coming from api/transactions/{id}/categories route 
         *! Else 
         *      Request is coming from api/categories route
         */ 
        $endUrl = Route::currentRouteName() === 'transactions.categories.index' ? explode('.', Route::currentRouteName())[1] : explode('.', Route::currentRouteName())[0];
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'link' => [
                'rel' => 'self',
                'href' => route($endUrl . '.show', $this->id),
            ],
        ];
    }
}