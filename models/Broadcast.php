<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $channel
 * @property string $message
 * @property string $user_identity
 * @property string $createdAt
 * @property string $updatedAt
 * @property int $external_id
 * @property boolean $active
 * @property Channel $channel
 */
class Broadcast extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['channel', 'message', 'user_identity', 'createdAt', 'updatedAt', 'external_id', 'active'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sasi_db';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo('App\Models\Sasi\Channel', 'channel', 'sasiAPIId');
    }
}
