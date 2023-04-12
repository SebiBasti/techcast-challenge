<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
  use HasFactory;
  protected $fillable = ['title', 'date'];
  public function presentations()
  {
    return $this->hasMany(Presentation::class, 'presentable_id');
  }
}
