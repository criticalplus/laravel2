<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Geo\City;
use App\Models\Geo\State;
use App\Models\Geo\Country;

class Address extends Model{
    
    use HasFactory, Notifiable, Sortable;

    
	public $sortable = ['id', 'user_id', 'country_id', 'state_id', 'city_id', 'alias', 'postal_code', 'phone', 'active', 'updated_at', 'created_at'];

    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'alias',
        'address',
        'postal_code',
        'phone',
        'active',
    ];


    
    //ELOQUENT

    protected $connection = 'mysql';
    protected $table = 'addresses';
    protected $primaryKey = 'id';

    public $timestamps = true;

    /** RELACIONES DEL MODELO EN LA BASE DE DATOS **/

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function city(){

        return $this->belongsTo(City::class, 'city_id');
    }

    public function state(){

        return $this->belongsTo(State::class, 'state_id');
    }

    public function country(){

        return $this->belongsTo(Country::class, 'country_id');
    }

    
}
