<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'supplier_id',
        'category_id',
        'quantity_per_unit',
        'unit_price',
        'units_in_stock',
        'units_on_order',
        'reorder_level',
        'discontinued ',
    ];
    public $timestamps = false;
}
