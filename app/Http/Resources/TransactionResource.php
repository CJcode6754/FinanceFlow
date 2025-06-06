<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'type' => $this->type,
            'formatted_amount' => $this->formatted_amount,
            'date' => $this->date->format('M d, Y'),
            'category' => [
                'name' => $this->category->name,
                'image' => asset('storage/' . $this->category->image),
            ],
            'wallet' => [
                'name' => $this->wallet->name,
            ]
        ];
    }
}
