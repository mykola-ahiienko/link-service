<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';
    protected $fillable = ['source_url', 'token', 'clicks', 'max_clicks', 'expires_at'];
}
