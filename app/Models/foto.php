<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class foto extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table = 'foto';
    protected $fillable = [
        'user_id',
        'album_id',
        'file',
        'judul',
        'deskripsi'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function album(){
        return $this->belongsTo(album::class);
    }

    public function komentar(){
        return $this->hasMany(komentar::class);
    }

    public function like(){
        return $this->hasMany(like::class);
    }

    
}
