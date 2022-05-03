<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Putusan extends Model
{
    //
    protected $table = 'putusan';

    protected $fillable = [
        'name', 'no_akta', 'seri_akta', 'no_perkara', 'file_putusan'
    ];


}
