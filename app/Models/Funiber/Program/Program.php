<?php

namespace App\Models\Funiber\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;
    protected $fillable = [
        'name',
        'description',
        'area_id',
        'short_code',
        'long_code',
        'order_record',
        'is_active',
    ];
}
