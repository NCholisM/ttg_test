<?php
// app/Models/Kategori.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    protected $table = 'kategori'; // Sesuaikan dengan nama tabel yang sudah ada
    protected $fillable = ['nama_kategori']; // Sesuaikan dengan kolom yang ada pada tabel produk
    public $timestamps = false;
    // ... tambahkan konfigurasi atau relasi lainnya sesuai kebutuhan
}
