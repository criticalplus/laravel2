<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserData extends Model{
    
    use HasFactory, Notifiable, Sortable;

    
	public $sortable = ['role', 'dni'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'role',
        'dni',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    
    //ELOQUENT

    /**
     * The event map for the model.
     *
     * @var array
     */
/*     protected $dispatchesEvents = [
        'saved' => UserSaved::class,
        'deleted' => UserDeleted::class,
    ]; */
  
    
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_data';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     * created_at // updated_a
     * @var bool
     */
    public $timestamps = false;


    public function user(){

        return $this->belongsTo(User::class);
    }



    /* MUTADORES Y ACCESORES */

    protected function role(): Attribute{

        return new Attribute(
            //ACCESOR->Modificamos el valor role cuando recibimos de la base de datos
            get: function($value){
                return ucfirst($value);
            },
            //MUTADOR->Modificamos el valor role cuando guardamos en la base de datos
            set: function($value){
                return strtolower($value);
            }
        );

    }

    protected function dni(): Attribute{

        return new Attribute(
            get: function($value){
                return strtoupper($value);
            },
            set: function($value){
                return strtolower($value);
            }
        );

    }




}
