<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  use HasFactory;

  /**
   * table
   *
   * @var string
   */
  protected $table = 'programs';

  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'program_name',
    'area_id',
  ];


  /**
   * hidden
   *
   * @var array
   */
  protected $hidden = ['created_at', 'updated_at'];
}
