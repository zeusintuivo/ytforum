<?php namespace YTForum\Models;

use Illuminate\Database\Eloquent\Model;

class PoolOptions extends Model {

	//
    protected $table = 'pool_options';
    protected $fillable = ['title','pool_id','vote']; 

}
