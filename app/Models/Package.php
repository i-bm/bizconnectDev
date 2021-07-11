<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,SoftDeletes;

    // protected $guarded = [];

    protected $fillable = [
        'title',
        'details',
        'currency',
        'price',
        'duration',
        'discount',
    ];



    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%'.$value.'%');
    }

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%'.$value.'%');
    }
    
    protected $casts = [
        'details' => 'array'
    ];

}