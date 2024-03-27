<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['id' , 'post_id' , 'user_id' , 'photo_path' , 'video_path' , 'file_path' , 'text'];

    public function post():BelongsTo{
        return $this->belongsTo(post::class , 'post_id');
    }

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }

    public function file() :HasOne {
        return $this->hasOne(commentfile::class , 'comment_id' , 'id');
    }

    public function like() : HasMany {
        return $this->hasMany(commentlike::class , 'comment_id' , 'id');
    }


}
