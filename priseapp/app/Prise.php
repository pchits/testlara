<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prise extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quantity'
    ];

    // Generate new game results
    public function update_stock($value) {

        $this->quantity = $this->quantity - $value;
    }

}
