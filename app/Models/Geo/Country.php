<?php

namespace App\Models\Geo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Geo\City;
use App\Models\Geo\State;
use App\Models\Address;

class Country extends Model{

    use HasFactory, Sortable;

	public $sortable = ['id', 'title'];


    protected $fillable = [
        'title',
    ];

    protected $hidden = [
        //'password',
        //'remember_token',
    ];

    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];



    //ELOQUENT

    protected $connection = 'mysql';
    protected $table = 'countries';
    protected $primaryKey = 'id';
    
    public $timestamps = false;

    /** RELACIONES DEL MODELO EN LA BASE DE DATOS **/


    public function state(){
        return $this->hasMany(State::class);
    }

    public function city(){
        return $this->hasMany(City::class);
    }


    
    public function Address(){
        return $this->hasMany(Address::class);
    }

}
