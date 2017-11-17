<?php

namespace Modules\Units\Entities;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ["title","extension","status"];
}
