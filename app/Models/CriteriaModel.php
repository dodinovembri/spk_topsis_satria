<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriteriaModel extends Model
{
    public $table ='kriteria';
    public $guarded ='[]';
    public $timestamps = false;

    public function criterion_value()
    {
        return $this->hasMany('App\Models\CriterionValueModel', 'id_kriteria', 'id');
    }
}
