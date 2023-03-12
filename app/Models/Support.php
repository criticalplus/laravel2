<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Support extends Model{

    use HasFactory, Notifiable, SoftDeletes, Sortable;

	public $sortable = ['id', 'user_id', 'admin_id', 'replyMail', 'subject', 'level', 'created_at', 'updated_at' ];
    
    protected $sortableAs = ['support_thread_count', 'User.name', 'User.user_id'];

    protected $fillable = [
        'user_id',
        'admin_id',
        'replyMail',
        'subject',
        'level',
    ];

    protected $hidden = [
        
    ];

    protected $casts = [
    ];



    //ELOQUENT
    
    protected $connection = 'mysql';
    protected $table = 'supports';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function admin(){

        return $this->belongsTo(User::class, 'admin_id');
    }

    public function supportComment(){

        return $this->hasMany(SupportComment::class);
    }


    //FUNCIONES CONSULTAS
    public function getSupportList( $paginate = PAGINATE){

        return $supports = Support::withCount([                                                                    //Contamos la cantidad de mensajes sin ver que tiene cada hilo
                            'SupportComment as support_thread_count' => function ($query) {
                                $query->where('view', 0);
                            }])                                                     
                            ->with(['user:id,name', 'admin:id,name', 'user.UserData:user_id,role'])          //Traemos relaciones
                            ->sortable(['updated_at' => 'DESC'])              
                            ->paginate($paginate)
                            ->withQueryString();

    }



}
