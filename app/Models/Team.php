<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nameTeam',
        'founded',
        
    ];
    public function Team()
    {
        return $this->belongsToMany(Team::class);

    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}