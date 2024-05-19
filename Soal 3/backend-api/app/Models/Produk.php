<?php
// app/Models/Produk.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produk';
    protected $table = 'produk'; // Sesuaikan dengan nama tabel yang sudah ada
    protected $fillable = ['nama_produk', 'harga', 'kategori_id', 'status_id']; // Sesuaikan dengan kolom yang ada pada tabel produk
    public $timestamps = false;
    // ... tambahkan konfigurasi atau relasi lainnya sesuai kebutuhan
}
