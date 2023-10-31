<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $table = 'election';
    protected $fillable = [
        'election_name',
        'status',
        'stardate',
        'enddate',
    ];
}
