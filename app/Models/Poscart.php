<?php

namespace App\Models;

use App\Models\Medication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poscart extends Model
{
    use HasFactory;
    public function Medication()
    {
        # code...
        return $this->belongsTo(Medication::class,'id');
    }
}
