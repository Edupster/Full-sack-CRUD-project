<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory,Sortable;
    public $timestamps = false;
    protected $fillable = [ 
        'name',
        'email',
        'address',
        'mobile',
        'items'
    ];
    
    public $sortable = ['id','name','email','address','mobile'];
}
