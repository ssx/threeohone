<?php

/*
 * This file is part of ssx/threeohone
 *
 *  (c) Scott Robinson <scott@dor.ky>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

namespace SSX\ThreeOhOne\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Models.
 */
class Redirect extends Model
{
    /**
     * @var string
     */
    protected $table = 'redirects';

    /**
     * @var array
     */
    protected $fillable = ['type', 'status', 'from', 'to', 'hits'];

    /**
     * @var bool
     */
    public $timestamps = true;
}
