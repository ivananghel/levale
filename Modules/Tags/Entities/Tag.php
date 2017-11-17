<?php

namespace Modules\Tags\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["title","color"];
}
