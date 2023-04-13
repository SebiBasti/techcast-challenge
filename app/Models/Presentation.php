<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Presentation extends Model
{
  use HasFactory;
  protected $fillable = [
    'title',
    'content',
    'presentable_id',
    'presentable_type',
  ];
  protected $with = ['presentable'];
  public function presentable(): MorphTo
  {
    return $this->morphTo();
  }
}
