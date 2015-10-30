<?php namespace SSX\ThreeOhOne\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Models
 * @package App\Models
 */
class Redirect extends Model {

    /**
     * @var string
     */
    protected $table = 'redirects';

    /**
     * @var array
     */
    protected $fillable = ['type', 'status', 'from', 'to', 'hits' ];

    /**
     * @var bool
     */
    public $timestamps = true;

}
