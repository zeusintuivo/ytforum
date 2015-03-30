<?php namespace YTForum\Http\Controllers;

use YTForum\Http\Requests;
use YTForum\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \YTForum\Models\Pool;
use \YTForum\Models\PoolOptions;

class PoolsController extends Controller {


	public function index()
	{
		// $pool = new Pool();
		// $pool->with('poolOptions')->get();
		return Pool::with('poolOptions')->get();
		// return "hola";
	}
 
	public function store()
	{
		$pool = new Pool(Request::all());
 		$pool->save();
		return $pool;
	}
 
	public function show($id)
	{
		return Pool::with('poolOptions')->findOrFail($id);
	}
 
	public function destroy($id)
	{
		$pool=Pool::find($id);
		$pool->delete();
	}
}
