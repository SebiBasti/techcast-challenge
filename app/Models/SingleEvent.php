<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SingleEvent extends Model
{
  use HasFactory;
  protected $fillable = ['title', 'date'];
  public function presentations(): MorphMany
  {
    return $this->morphMany(Presentation::class, 'presentable');
  }
}
