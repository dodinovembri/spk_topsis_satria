<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternativeAccessibilityModel extends Model
{
    public $table ='aksesibilitas_alternatif';
    public $guarded ='[]';
    public $timestamps = false;

    public function accessibility()
    {
        return $this->belongsTo('App\Models\AccessibilityModel', 'id_aksesibilitas');
    }
}
