<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory,Sortable;
    public $timestamps = false;
    protected $fillable = [ 
        'item',
        'price',
        'category'];
    public $sortable = ['id', 'item', 'price', 'category'];

}
