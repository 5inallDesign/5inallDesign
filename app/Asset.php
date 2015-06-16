<?php

namespace App;

class Asset extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'assets';

	/**
     * An asset has a parent client
     *
     * @return Client
     */
	public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}
