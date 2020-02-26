<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // Menggunakan soft delete
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    // Konfigurasi untuk Mass Assigment
    protected $fillable = [
        'title', 'body', 'user_id'
    ];
}
