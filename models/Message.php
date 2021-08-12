<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $channel
 * @property int $client
 * @property int $site
 * @property string $uuid
 * @property int $sasiAPIId
 * @property int $status
 * @property string $text
 * @property int $priority
 * @property boolean $test
 * @property boolean $anonymous
 * @property mixed $location
 * @property float $lat
 * @property float $lon
 * @property int $groupId
 * @property int $mobileAlertPanel
 * @property mixed $meta
 * @property string $generatedAt
 * @property string $sasiUpdatedAt
 * @property string $sasiCreateddAt
 * @property string $createdAt
 * @property string $updatedAt
 * @property int $schema_version
 * @property Channel $channel
 * @property Client $client
 * @property Group $group
 * @property Profile $profile
 * @property Site $site
 * @property AlertEvent[] $alertEvents
 */
class Message extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'alerts';

    /**
     * @var array
     */
    protected $fillable = ['channel', 'client', 'site', 'uuid', 'sasiAPIId', 'status', 'text', 'priority', 'test', 'anonymous', 'location', 'lat', 'lon', 'groupId', 'mobileAlertPanel', 'meta', 'generatedAt', 'sasiUpdatedAt', 'sasiCreateddAt', 'createdAt', 'updatedAt', 'schema_version'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Sasi\Client', 'client', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Sasi\Group', 'groupId', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo('App\Models\Sasi\Profile', 'mobileAlertPanel', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo('App\Models\Sasi\Site', 'site', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alertEvents()
    {
        return $this->hasMany('App\Models\Sasi\AlertEvent', null, 'sasiAPIId');
    }
}
