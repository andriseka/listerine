<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrGenerate extends Model
{
    use HasFactory;

    protected $table = 'qr_generates';
    
    protected $fillable = [
        'name', 'slug', 'qrcode', 'count_scan'
    ];
}
