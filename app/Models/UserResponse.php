<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prequalification()
    {
        return $this->belongsTo(Prequalification::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
