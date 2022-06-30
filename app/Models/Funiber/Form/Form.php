<?php

namespace App\Models\Funiber\Form;

use App\Models\Funiber\Form\Traits\FormRules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes, UuidTrait, FormRules;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'comments',
        'policy_acceptance_check',
        'program_id',
        'area_id',
    ];
}
