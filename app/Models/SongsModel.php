<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SongsModel extends Model
{
    protected $fillable = ['id', 'title', 'is_enable'];
    protected $hidden = ['created_at', 'updated_at'];

}
