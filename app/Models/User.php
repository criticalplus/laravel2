<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Events\UserDeleted;
use App\Events\UserSaved;
use App\Models\UserData;
use App\Models\UserServer;
use App\Models\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable{
    
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Sortable;

	public $sortable = ['id', 'name', 'email', 'created_at', 'updated_at', 'role'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    //ELOQUENT

    protected $connection = 'mysql';
    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    /** RELACIONES DEL MODELO EN LA BASE DE DATOS **/

    public function UserData(){

        return $this->hasOne(UserData::class);
    }

    public function Support(){

        return $this->hasMany(Support::class)->orderBy('updated_at' , 'DESC');
    }

    public function Address(){

        return $this->hasMany(Address::class);
    }

    public function UserServer(){

        return $this->hasMany(UserServer::class);
    }



    /* MUTADORES Y ACCESORES */

    protected function email(): Attribute{

        return new Attribute(
            //ACCESOR->Modificamos el valor email cuando recibimos de la base de datos
            get: fn($value) => $value,
            //MUTADOR->Modificamos el valor email cuando guardamos en la base de datos
            set: fn($value) => strtolower($value)
        );

    }



    /** FUNCIONES AUTH **/

    public function hasRole(string $role): bool {

        return $this->getAttribute('role') === $role;

    }





}
