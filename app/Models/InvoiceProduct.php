<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceProduct extends Model
{
    use HasFactory;
    protected $fillable = ['qty', 'sale_price', 'user_id', 'product_id', 'invoice_id'];

    public function product(): BelongsTo
    {
        return $this->BelongsTo(Products::class);
    }
}
