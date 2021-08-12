<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $groupid
 * @property int $sasiAPIId
 * @property string $name
 * @property string $channelType
 * @property int $fsm_id
 * @property boolean $primary
 * @property int $clientId
 * @property string $sasiUpdatedAt
 * @property string $createdAt
 * @property string $updatedAt
 * @property Client $client
 * @property Group $group
 * @property Message[] $messages
 * @property Broadcast[] $broadcasts
 * @property ChannelSchema[] $channelSchemas
 * @property ChannelSearchableField[] $channelSearchableFields
 */
class Channel extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['groupid', 'sasiAPIId', 'name', 'channelType', 'fsm_id', 'primary', 'clientId', 'sasiUpdatedAt', 'createdAt', 'updatedAt'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sasi_db';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Sasi\Client', 'clientId', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Sasi\Group', 'groupid', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Sasi\Message', 'channel', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function broadcasts()
    {
        return $this->hasMany('App\Models\Sasi\Broadcast', 'channel', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channelSchemas()
    {
        return $this->hasMany('App\Models\Sasi\ChannelSchema', 'channel', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channelSearchableFields()
    {
        return $this->hasMany('App\Models\Sasi\ChannelSearchableField', 'channel', 'sasiAPIId');
    }
}
