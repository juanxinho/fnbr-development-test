<?php

namespace App\Models\Funiber\Template;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;

class TemplateEmail extends Model
{
    use HasFactory,
        UuidTrait;

    protected $fillable = [
        'name',
        'description',
        'short_code',
        'long_code',
        'order',
        'is_active',
        'template',
        'created_by',
        'updated_by',
    ];
}
