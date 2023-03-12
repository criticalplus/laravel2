<?php

namespace App\Models\Geo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Geo\Country;
use App\Models\Geo\City;
use App\Models\Address;

class State extends Model{

    use HasFactory, Sortable;

	public $sortable = ['id', 'title'];

    protected $fillable = [
        'country_id',
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
    protected $table = 'states';
    protected $primaryKey = 'id';
    
    public $timestamps = false;

    /** RELACIONES DEL MODELO EN LA BASE DE DATOS **/

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
    
    public function city(){
        return $this->hasMany(City::class);
    }

    
    public function Address(){
        return $this->hasMany(Address::class);
    }


}
