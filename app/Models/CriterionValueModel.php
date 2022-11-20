<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriterionValueModel extends Model
{
    public $table ='nilai_kriteria';
    public $guarded ='[]';
    public $timestamps = false;

    public function criteria()
    {
        return $this->belongsTo('App\Models\CriteriaModel', 'id_kriteria');
    }
}
