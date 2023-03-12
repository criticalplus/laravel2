<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class CmVersion extends Model{
    
    use HasFactory, Notifiable, Sortable;

    
	public $sortable = ['name', 'version', 'publishing'];

    protected $fillable = [
        'name',
        'version',
        'publishing'
    ];

    protected $hidden = [
        
    ];

    protected $casts = [
    ];

    
    //ELOQUENT

    protected $connection = 'mysql';
    protected $table = 'cm_versions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function UserServer(){

        return $this->hasOne(UserServer::class);
    }






}
