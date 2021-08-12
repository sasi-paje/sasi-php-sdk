<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sasiAPIId
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property mixed $profileProps
 * @property mixed $customProps
 * @property int $clientId
 * @property int $siteId
 * @property string $appVersion
 * @property string $sasiUpdatedAt
 * @property string $createdAt
 * @property string $updatedAt
 * @property Client $client
 * @property Site $site
 * @property Message[] $messages
 */
class Profile extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'maps';

    /**
     * @var array
     */
    protected $fillable = ['sasiAPIId', 'name', 'email', 'phone', 'profileProps', 'customProps', 'clientId', 'siteId', 'appVersion', 'sasiUpdatedAt', 'createdAt', 'updatedAt'];

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
    public function site()
    {
        return $this->belongsTo('App\Models\Sasi\Site', 'siteId', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Sasi\Message', 'mobileAlertPanel', 'sasiAPIId');
    }
}
