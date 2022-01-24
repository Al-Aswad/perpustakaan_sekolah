<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory, Timestamp;
    protected $table = 'penerbit';

    protected $fillable = [
        'name',
    ];
}
