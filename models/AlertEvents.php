<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $alert_id
 * @property string $event_type
 * @property mixed $meta
 * @property string $user_identity
 * @property string $createdAt
 * @property string $updatedAt
 * @property Message $message
 */
class AlertEvents extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['alert_id', 'event_type', 'meta', 'user_identity', 'createdAt', 'updatedAt'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sasi_db';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function message()
    {
        return $this->belongsTo('App\Models\Sasi\Message', null, 'sasiAPIId');
    }
}
