<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Support;

class SupportComment extends Model{

    use HasFactory, Notifiable, Sortable;

	public $sortable = ['message', 'ip', 'mac', 'support_thread_count, updated_at, created_at'];

    protected $fillable = [
        'support_id',
        'user_id',
        'message',
        'file',
        'ip',
        'mac',
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
    
    protected $connection = 'mysql';    
    protected $table = 'supports_comment';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    public function support(){

        return $this->belongsTo(Support::class, 'support_id');

    }
    

    //Funciones modelo

    public function newAdminComment($support, $request){
        
        $this->support_id = $support->id;
        $this->isAdmin = 1;
        $this->message = $request->threadComment;
        $this->view = 1;
        
        if( $support->admin_id == NULL ){
            $support->admin_id = Auth::id();
            $support->save();
        }

        if ($request->hasFile('threadFile')) {

            $store = $request->file('threadFile');
            $this->file = Storage::url( $store->store('/public/threadFile') ); //   /storage/app

        }
        
        $this->save();

    }


}
