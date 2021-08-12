<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $channel
 * @property string $name
 * @property int $schema_version
 * @property string $createdAt
 * @property string $updatedAt
 * @property Channel $channel
 */
class ChannelSearchableField extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['channel', 'name', 'schema_version', 'createdAt', 'updatedAt'];

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
