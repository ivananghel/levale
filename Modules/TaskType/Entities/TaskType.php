<?php

namespace Modules\TaskType\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    protected $table = 'task_types';
    protected $fillable = ["title","status"];
}
