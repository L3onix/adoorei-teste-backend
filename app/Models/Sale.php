<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = ['sales_id', 'total_price'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function addProductsToSale(array $products): void
    {
        foreach($products as $product) {
            $this->products()->save(Product::find($product['id']), ['amount' => $product['amount']]);
        }
        $this->refreshTotalPrice();
    }

    public function refreshTotalPrice(): void
    {
        $totalPrice = 0;
        foreach($this->products as $product) {
            $totalPrice += (
                $product->price * $product->pivot->amount
            );
        }
        $this->total_price = $totalPrice;
        $this->save();
    }
}
