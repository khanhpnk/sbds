<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to',
        'subject',
        'message',
        'read',
    ];

    /**
     * User 1-n Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userTo()
    {
        return $this->belongsTo('App\User', 'to');
    }

    /**
     * User 1-n Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userFrom()
    {
        return $this->belongsTo('App\User', 'from');
    }
}
