<?php

namespace App\Models;

use App\Models\Traducteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Langue extends Model
{
    use HasFactory;

    protected $fillable =[
        'libelle',
        'image'
    ];
    public function traducteurs(){
        return $this->hasMany(Traducteur::class);
    }
}
