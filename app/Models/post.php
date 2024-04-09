<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;


class post extends Model
{
    use HasFactory;
    use LogsActivity ;

    protected $fillable = ['user_id' ,  'text' , 'id'];

    protected static $logAttributes = [ 
        'text',
    ];

    protected static $recordEvents = [
        'created',
        'updated',
        'deleted'
    ];


    protected static $logName ;


    public function getActivitylogOptions(): \Spatie\Activitylog\LogOptions
    {
        return \Spatie\Activitylog\LogOptions::defaults();
    }

    public function user():BelongsTo{
        return $this->belongsTo(user::class , 'user_id');
    }

    public function comment():HasMany{
        return $this->hasMany(comment::class , 'post_id' , 'id');
    }

    public function like():HasMany{
        return $this->hasMany(like::class , 'post_id' , 'id');
    }

    public function file():HasMany{
        return $this->hasMany(file::class , 'post_id' , 'id');
    }

    public function share():HasMany{
        return $this->hasMany(share::class , 'post_id' , 'id');
    }

}
