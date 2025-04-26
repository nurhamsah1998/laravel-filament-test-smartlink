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
        'assigned_to',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
