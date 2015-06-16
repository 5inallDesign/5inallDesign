<?php

namespace App;

class Testimonial extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'testimonials';

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
