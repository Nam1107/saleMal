<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id',
        'token_type',
        'refresh_token'
    ];
    protected $primaryKey = 'id';
    protected $table = 'refresh_tokens';
}
