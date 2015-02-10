<?php

class Client extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	/**
     * A client has many assets
     *
     * @return Asset
     */
	public function Asset()
    {
        return $this->hasMany('Asset');
    }

    /**
     * A client has many testimonials
     *
     * @return Testimonial
     */
	public function Testimonial()
    {
        return $this->hasMany('Testimonial');
    }

}
