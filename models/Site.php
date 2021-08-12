<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sasiAPIId
 * @property string $name
 * @property string $siteType
 * @property string $code
 * @property string $tag
 * @property string $referencePoint
 * @property float $radius
 * @property int $clientId
 * @property float $lat
 * @property float $lon
 * @property string $sasiUpdatedAt
 * @property string $createdAt
 * @property string $updatedAt
 * @property Client $client
 * @property Message[] $messages
 * @property Profile[] $profiles
 */
class Sites extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sasiAPIId', 'name', 'siteType', 'code', 'tag', 'referencePoint', 'radius', 'clientId', 'lat', 'lon', 'sasiUpdatedAt', 'createdAt', 'updatedAt'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Sasi\Message', 'site', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profiles()
    {
        return $this->hasMany('App\Models\Sasi\Profile', 'siteId', 'sasiAPIId');
    }
}
