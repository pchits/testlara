<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'money_max', 'money_min', 'money_limit', 'mana_min', 'mana_max', 'conversion_coef'
    ];

    // Change available money limit
    public function change_money_limit($value)
    {
        $this->money_limit = $this->money_limit - $value;

        return true;
    }
}
