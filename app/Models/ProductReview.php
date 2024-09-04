<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'rating', 'product_id', 'user_id'];

    public function profile(): BelongsTo
    {
        return $this->BelongsTo(CustomerProfile::class, 'customer_id');
    }
}
