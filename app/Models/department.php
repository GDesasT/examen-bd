<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'budget', 'expense'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
