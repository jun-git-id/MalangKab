<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatUsaha extends Model
{
    protected $fillable = ['nama_tempat','foto_tempat_usaha','alamat','pemilik','no_telp','deskripsi','no_izin_usaha',
        'foto_izin_usaha','tgl_izin_berkhir','koordinat_lokasi','kecamatan_id','desa_id', 'kategori_usaha_id', 'kegiatan_usaha_id',
'status_kepemilikan_id', 'jenis_investasi_id', 'like','rating','views','status'];

}
