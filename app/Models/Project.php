<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function usersAssigned(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'assigned_to');
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
