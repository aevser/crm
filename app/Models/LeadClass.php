<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'color',
        'project_id'
    ];
}
