<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $channel
 * @property int $version
 * @property mixed $schema
 * @property string $createdAt
 * @property string $updatedAt
 * @property Channel $channel
 * @property ChannelSchemaField[] $channelSchemaFields
 */
class ChannelSchema extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['channel', 'version', 'schema', 'createdAt', 'updatedAt'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channelSchemaFields()
    {
        return $this->hasMany('App\Models\Sasi\ChannelSchemaField', 'schema_id');
    }
}
