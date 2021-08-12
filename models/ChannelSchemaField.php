<?php

namespace App\Models\Sasi;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $schema_id
 * @property string $name
 * @property string $key
 * @property string $type
 * @property boolean $searchable
 * @property int $schema_version
 * @property string $created_at
 * @property string $updated_at
 * @property ChannelSchema $channelSchema
 */
class ChannelSchemaField extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['schema_id', 'name', 'key', 'type', 'searchable', 'schema_version', 'created_at', 'updated_at'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'sasi_db';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channelSchema()
    {
        return $this->belongsTo('App\Models\Sasi\ChannelSchema', 'schema_id');
    }
}
