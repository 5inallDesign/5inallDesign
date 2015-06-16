<?php

namespace App;

class Client extends Model
{
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

    public function asset()
    {
    	return $this->hasMany('App\Asset')->orderBy('display_order');
    }

    /**
     * A client has many testimonials
     *
     * @return Testimonial
     */
	public function testimonial()
    {
        return $this->hasMany('App\Testimonial');
    }
}
