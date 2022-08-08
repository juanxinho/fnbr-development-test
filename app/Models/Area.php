<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  use HasFactory;

  /**
   * table
   *
   * @var string
   */
  protected $table = 'areas';

  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'name'
  ];


  /**
   * hidden
   *
   * @var array
   */
  protected $hidden = ['created_at', 'updated_at'];
}
