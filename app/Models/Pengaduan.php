<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'id_masyarakat',
        'isi_pengaduan',
        'foto',
        'status',
        
    ];

    protected $date = 'tgl_pengaduan';

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat', 'id');
    }
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_tanggapan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
