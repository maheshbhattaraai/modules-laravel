<?php

namespace Modules\Channel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'created_at',
		'updated_at'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Channel\Database\factories\ChannelFactory::new();
    }
}
