<?php namespace YTForum\Models;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model {

	//
	public function poolOptions()
    {
        return $this->hasMany('YTForum\Models\PoolOptions');
    }

}
