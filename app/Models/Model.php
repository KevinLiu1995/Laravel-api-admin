<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Model extends BaseModel
{
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at'
    ];

    protected $hidden = [
        'deleted_at',
        'pivot',
//        'laravel_through_key'
    ];

    protected static function boot()
    {
        parent::boot();

        // 全局数据按照时间倒序排列
//        static::addGlobalScope('order_by_created_at_desc', function(Builder $builder) {
//            $builder->orderByDesc('created_at');
//        });
    }
}
