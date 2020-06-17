<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'quantity' => $this->quantity,
            'buyer_id' => $this->buyer_id,
            'product_id' => $this->product_id,
            'createdAt' => (string)$this->created_at,
            'updatedAt' => (string)$this->updated_at,
            'deletedAt' => isset($this->deleted_at) ? (string)$this->deleted_at : null,
        ];
    }
}
