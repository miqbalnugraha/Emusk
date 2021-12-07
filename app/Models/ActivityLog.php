<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ActivityLog extends Model
{
    protected $table = 'activity_log';
    protected $fillable = ['id', 'log_name', 'description', 'subject_type', 'subject_id', 'causer_type', 'causer_id', 'properties','created_at','updated_at'];

    public function allData(){
        return DB::table('activity_log')
        ->join('users', 'activity_log.causer_id', '=', 'users.id')
        ->where('log_name','login')
        ->select(['activity_log.log_name','activity_log.causer_id','activity_log.properties','activity_log.created_at','users.name','users.level'])
        ->orderBy('created_at','desc')
        ->paginate(10);
      }      
}
