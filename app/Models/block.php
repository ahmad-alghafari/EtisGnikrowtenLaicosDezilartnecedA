<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class block extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'user_blocker' , 'user_blocked' ];

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_blocker');
    }
}
