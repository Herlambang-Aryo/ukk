<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'komentar';
    protected $fillable =['isi'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }
}
