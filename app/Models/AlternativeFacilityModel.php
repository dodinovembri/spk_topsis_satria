<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternativeFacilityModel extends Model
{
    public $table ='fasilitas_alternatif';
    public $guarded ='[]';
    public $timestamps = false;

    public function facility()
    {
        return $this->belongsTo('App\Models\FacilityModel', 'id_fasilitas');
    }
}
