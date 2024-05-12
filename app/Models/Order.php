<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Dictionaries\OrderStatus;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status_id',
        'comment'
    ];

    /*public function status()
    {
        return OrderStatus::status($this->status_id);
    }*/

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn () => OrderStatus::status($this->status_id),
        );
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products(): BelongsToMany 
    {
        return $this->belongsToMany(Product::class);
    }
}
