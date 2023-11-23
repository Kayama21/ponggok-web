<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Surat extends Model
{
    use HasFactory;

    protected $fillable = ['namaPengaju', 'nik', 'detailAjuan', 'ktpPic', 'kategoriSurat', 'pdfDokumen', 'statusSurat', 'wa', 'email'];

    public function kategoris(){
        return $this->belongsTo('App\Kategori');
    }

}
