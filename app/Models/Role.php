<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'create_projects',
        'manage_users',
        'manage_permissions',
        'edit_projects',
        'global_settings',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
