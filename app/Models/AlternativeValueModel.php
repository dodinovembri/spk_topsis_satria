<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternativeValueModel extends Model
{
    public $table ='nilai_alternatif';
    public $guarded ='[]';
    public $timestamps = false;

    public function alternative()
    {
        return $this->belongsTo('App\Models\AlternativeModel', 'id_alternatif');
    }

    public function criteria()
    {
        return $this->belongsTo('App\Models\CriteriaModel', 'id_kriteria');
    }

    public function criterion_value()
    {
        return $this->belongsTo('App\Models\CriterionValueModel', 'id_nilai_kriteria');
    }
}
