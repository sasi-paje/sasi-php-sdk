<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $sasiAPIId
 * @property string $createdAt
 * @property string $updatedAt
 * @property Message[] $messages
 * @property Channel[] $channels
 */
class Group extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'sasiAPIId', 'createdAt', 'updatedAt'];

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
        return $this->hasMany('App\Models\Sasi\Message', 'groupId', 'sasiAPIId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channels()
    {
        return $this->hasMany('App\Models\Sasi\Channel', 'groupid', 'sasiAPIId');
    }
}
