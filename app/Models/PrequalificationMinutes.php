<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrequalificationMinutes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prakualifikasi()
    {
        return $this->belongsTo(Prequalification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
