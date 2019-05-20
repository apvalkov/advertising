<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Browser
 * @package App\Models
 */
class Browser extends Model
{
    use SoftDeletes;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'title',
    ];
}
