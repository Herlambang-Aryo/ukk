<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;
    protected $table = 'album';
    
    protected $fillable = [
        'nama',
        'deskripsi',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function foto(){
        return $this->hasMany(Foto::class);
    }

}
