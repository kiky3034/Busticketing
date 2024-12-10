<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
