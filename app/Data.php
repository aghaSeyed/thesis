<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Data
 * @package App
 * @property integer type
 * @property q1
 */
class Data extends Model
{
    protected $fillable = [
        'type',
        'q',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
