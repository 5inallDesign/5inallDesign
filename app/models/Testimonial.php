<?php

class Testimonial extends Eloquent {

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
        return $this->belongsTo('Client', 'client_id');
    }

}
