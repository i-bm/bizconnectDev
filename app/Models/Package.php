<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,LogsActivity,SoftDeletes;

    // protected $guarded = [];

    protected $fillable = [
        'title',
        'details',
        'currency',
        'price',
        'duration',
        'discount',
    ];

public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'title',
            'details',
            'currency',
            'price',
            'duration',
            'discount',
        ]);
    }

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