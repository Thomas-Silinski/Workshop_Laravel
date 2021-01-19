<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * ManyToOne.
    */
    public function user()
    {
        return $this->ManyToOne('App\User', 'id', 'user_id');
    }

    /**
     * ManyToOne.
    */
    public function immeuble()
    {
        return $this->ManyToOne('App\Immeuble', 'id', 'immeuble_id');
    }
}