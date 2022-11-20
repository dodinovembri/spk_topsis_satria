<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternativeModel extends Model
{
    public $table ='alternatif';
    public $guarded ='[]';
    public $timestamps = false;

    public function alternative_value()
    {
    	return $this->hasMany('App\Models\AlternativeValueModel', 'id_alternatif', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\TypeModel', 'id_kategori');
    }

    public function gallery()
    {
    	return $this->hasMany('App\Models\AlternativeGalleryModel', 'id_alternatif', 'id');
    }    
}
