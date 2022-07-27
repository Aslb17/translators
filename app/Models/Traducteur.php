<?php

namespace App\Models;

use App\Models\Langue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Traducteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'tel',
        'email',
        'image',
        'id_langue'
    ];
    public function langue(){
        return $this->belongsTo(Langue::class, 'id_langue', 'id');
    }
}
