<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = ['nif', 'first_name', 'last_name1', 'last_name2', 'department_id'];

    public function department()
    {
        return $this->belongsTo(department::class);
    }
}
