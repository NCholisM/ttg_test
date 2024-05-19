<?php
// app/Models/Status.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_status';
    protected $table = 'status'; // Sesuaikan dengan nama tabel yang sudah ada
    protected $fillable = ['nama_status']; // Sesuaikan dengan kolom yang ada pada tabel produk
    public $timestamps = false;
    // ... tambahkan konfigurasi atau relasi lainnya sesuai kebutuhan
}
