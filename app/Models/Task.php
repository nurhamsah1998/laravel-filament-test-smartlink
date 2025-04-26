<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
        'user_id',
        'status',
    ];
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
