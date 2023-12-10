<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];



    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function lpj(){
        return $this->hasOne(Lpj::class);
    }
    public function Proposal(){
        return $this->hasOne(Proposal::class);
    }

    public function berkas(){
        return $this->hasMany(Berkas::class);
    }
    

}

