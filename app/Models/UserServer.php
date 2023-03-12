<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\CmVersion;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserServer extends Model{
    
    use HasFactory, Notifiable, SoftDeletes, Sortable;

    
	public $sortable = ['user_id', 'name', 'cm', 'ws_url', 'ws_api', 'color', 'active'];

    protected $fillable = [
        'user_id',
        'name',
        'cm',
        'ws_url',
        'ws_api',
        'color',
        'active'
    ];

    protected $hidden = [
        
    ];

    protected $casts = [
    ];

    
    //ELOQUENT

    protected $connection = 'mysql';
    protected $table = 'users_server';
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function cmVersion(){

        return $this->belongsTo(cmVersion::class);
    }


    //FUNCIONES FORMULARIO
    public function updateServerFields( $request, UserServer $server ){

        $server->cm_version_id = $request->version ;
        $server->name = $request->name ;
        $server->ws_url = $request->ws_url ;
        $server->ws_api = $request->ws_api ;
        $server->color = $request->color ;
        $server->active = 1 ;
        
        return $server;
    }


}
