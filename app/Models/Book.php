<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Timestamp;
    protected $table = 'books';

    protected $fillable = [
        'name',
        'pengarang_id',
        'penerbit_id',
        'tahun',
        'total'
    ];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }
}
