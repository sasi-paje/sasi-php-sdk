<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sasiAPIId
 * @property string $name
 * @property boolean $active
 * @property string $nickname
 * @property string $sasiUpdatedAt
 * @property string $createdAt
 * @property string $updatedAt
 * @property Message[] $messages
 * @property Channel[] $channels
 * @property Profile[] $profiles
 * @property Site[] $sites
 */
class Client extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sasiAPIId', 'name', 'active', 'nickname', 'sasiUpdatedAt', 'createdAt', 'updatedAt'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sasi_db';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Sasi\Message', 'client', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channels()
    {
        return $this->hasMany('App\Models\Sasi\Channel', 'clientId', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profiles()
    {
        return $this->hasMany('App\Models\Sasi\Profile', 'clientId', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sites()
    {
        return $this->hasMany('App\Models\Sasi\Site', 'clientId', 'sasiAPIId');
    }
}
