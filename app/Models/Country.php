<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * @package App\Models
 */
class Country extends Model
{
    use SoftDeletes;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'title',
    ];
}
