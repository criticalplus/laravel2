<?php

namespace App\Models\Geo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Geo\Country;
use App\Models\Geo\State;
use App\Models\Address;

class City extends Model{ 

    use HasFactory, Sortable;

	public $sortable = ['id', 'title'];

    /**
     * Columnas de tabla que se pueden actualizar con el ORM
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'state_id',
        'title',
    ];

    /**
     * Columnas que nunca devuelven las consultas
     *
     * @var array
     */
    protected $hidden = [
        //'password',
        //'remember_token',
    ];

    /**
     * Validacion/filtro  de campo
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];


    
    //ELOQUENT

    protected $connection = 'mysql';
    protected $table = 'cities';
    protected $primaryKey = 'id';
    
    public $timestamps = false;

    /** RELACIONES DEL MODELO EN LA BASE DE DATOS **/

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }


    public function Address(){
        return $this->hasOne(Address::class);
    }

}
