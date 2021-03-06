<?php

namespace App\Models;

use App\Models\Poscart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medication extends Model
{
    use HasFactory;

    public function Poscart()
    {
        # code...
        return $this->belongsToMany(Poscart::class,'drug_id','id');
    }
}
