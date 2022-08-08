<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoFuniber extends Model
{
  use HasFactory;

  /**
   * table
   *
   * @var string
   */
  protected $table = 'info_funiber';

  /**
   * fillable
   *
   * @var array
   */
  protected $fillable = [
    'names',
    'lastnames',
    'email',
    'country',
    'state',
    'city',
    'program_id',
    'area_id',
    'phone',
    'comments',
    'policy',
  ];

  /**
   * hidden
   *
   * @var array
   */
  protected $hidden = ['created_at', 'updated_at'];

  /**
   * program
   *
   * @return void
   */
  public function program () {
    return $this->belongsTo(Program::class, 'program_id');
  }

  /**
   * area
   *
   * @return void
   */
  public function area () {
    return $this->belongsTo(Area::class, 'area_id');
  }
}
