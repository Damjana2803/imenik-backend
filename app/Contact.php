<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const TIPOVI_BROJA = ['privatni', 'poslovni'];

    protected $fillable = [
        'user_id',
        'ime',
        'broj',
        'email',
        'tip_broja',
        'beleske'
    ];
}
