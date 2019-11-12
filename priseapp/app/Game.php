<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Prise;
use App\Settings;

class Game extends Model
{
    //
    protected $prise_types = ['money', 'mana', 'real'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'prise_id', 'prise_type', 'prise_value', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function prise()
    {
        return $this->belongsTo('App\Prise');
    }

    public function save(array $options = [])
    {

        if (($this->prise_type == 'mana') && ($this->status == 'NEW')) {
            $this->status = 'APPLIED';
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->add_mana($this->prise_value);
            $user->save();
        }
        
        if (($this->prise_type == 'money') && ($this->status == 'NEW')) {

            $settings = Settings::findOrFail(1);
            $settings->change_money_limit($this->prise_value);
            $settings->save();

        }

        if (($this->prise_type == 'real') && ($this->status == 'NEW')) {

            $prise = Prise::find($this->prise_id);
            $prise->update_stock($this->prise_value);
            $prise->save();

        }

        parent::save($options);
    }

    // Generate new game results
    public function generate($money_limits, $mana_limits, $money_stock)
    {
        $id = null;
        $name = null;
        $type_key = mt_rand(0, sizeof($this->prise_types) - 1);
        
        $type = $this->prise_types[$type_key];
        
        if ($type == 'money') {
            $value = mt_rand($money_limits[0], $money_limits[1]);
            //we can't give this prise
            if ($money_stock < $value) {
                $this->generate($money_limits, $mana_limits, $money_stock);
            }
        }
        elseif ($type == 'mana') {
            $value = mt_rand($mana_limits[0], $mana_limits[1]);
        }
        else {
            $value = 1;
            $prise = DB::table('prises')
                ->where('quantity', '>=', 1)
                ->inRandomOrder()
                ->first();
            // $query = Prise::where('quantity', '>=', 188)->orderByRandom()->first();
            // var_dump($prise);
            //we don't have prises
            if ($prise === NULL) {
                //we can't give this prise
                $this->generate($money_limits, $mana_limits, $money_stock);
            }
            else {
                $name = $prise->name;
                $id = $prise->id;
            }
        }

        $user = Auth::user();

        $this->user_id = $user->id;
        $this->prise_type = $type;
        $this->prise_value = $value;
        $this->status = 'NEW';
        $this->prise_id = $id;

        return true;
    }

    // Generate new game results
    public function convert_to_mana($coef)
    {

        $this->prise_type = 'mana';
        $this->prise_value = $coef * $this->prise_value;

        return true;
    }

    // Send money to bank
    public function send_money_to_user()
    {

        $this->status = 'APPLIED';
        $this->save();

        //HERE IS BANK API REQUEST

        return true;
    }
}
