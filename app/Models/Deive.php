<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deive extends Model
{
    use HasFactory;


    protected $table = 'drives';
    protected $fillable = [
        'name',
        'discription',
        'size',
        'file',
        'extension',
        'status',
        'userId'
    ];

}
