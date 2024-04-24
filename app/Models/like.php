<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $table = 'like';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }
}
