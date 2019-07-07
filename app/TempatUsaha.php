<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatUsaha extends Model
{
    protected $fillable = ['nama_tempat', 'foto_tempat_usaha', 'alamat', 'pemilik', 'no_telp', 'deskripsi', 'izin_usaha_id',
        'id_jenis_izin_usaha', 'tgl_izin_berkhir', 'lokasi', 'lokasi_lat', 'lokasi_lang', 'kecamatan_id', 'desa_id', 'kategori_usaha_id', 'sub_kategori_usaha_id',
        'kegiatan_usaha_id', 'status_kepemilikan_id', 'nominal_investasi', 'user_id', 'jenis_investasi_id', 'like', 'rating', 'views', 'status'];

    public function izinUsaha()
    {
        return $this->belongsTo(IzinUsaha::class, 'izin_usaha_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function kategoriUsaha()
    {
        return $this->belongsTo(KategoriUsaha::class);
    }
    public function subKategoriUsaha()
    {
        return $this->belongsTo(SubKategoriUsaha::class);
    }
    public function kegiatanUsaha()
    {
        return $this->belongsTo(KegiatanUsaha::class);
    }

    public function statusKepemilikan()
    {
        return $this->belongsTo(StatusKepemilikan::class);
    }

    public function jenisInvestasi()
    {
        return $this->belongsTo(JenisInvestasi::class);
    }

    public function jenisIzinUsaha()
    {
        return $this->belongsTo(JenisIzinUsaha::class);
    }
}
