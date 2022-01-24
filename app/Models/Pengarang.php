<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory, Timestamp;
    protected $table = 'pengarang';

    protected $fillable = [
        'name',
    ];
}
