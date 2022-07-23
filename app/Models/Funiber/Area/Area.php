<?php

namespace App\Models\Funiber\Area;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;
    protected $fillable = [
        'name',
        'description',
        'short_code',
        'long_code',
        'order_record',
        'is_active',
    ];
}
