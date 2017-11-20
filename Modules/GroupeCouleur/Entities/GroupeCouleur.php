<?php

namespace Modules\GroupeCouleur\Entities;

use Illuminate\Database\Eloquent\Model;

class GroupeCouleur extends Model
{
    protected $table = "group_color";
    protected $fillable = ["title","status","group_color"," created_at"];
}
