<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presentation extends Model
{
  use HasFactory;
  protected $fillable = [
    'title',
    'content',
    'presentable_id',
    'presentable_type',
  ];
  public function presentable()
  {
    return $this->morphTo();
  }
}
