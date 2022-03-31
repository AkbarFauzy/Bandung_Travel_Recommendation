<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email', 'password', 'name','role'
    ];

    protected $hidden = [
        'password', 'api_token'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }

    public function user_interact_logs()
    {
        return $this->hasMany(UserInteractLogs::class, 'user_id', 'id');
    }
}
