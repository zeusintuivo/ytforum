<?php namespace YTForum\Http\Controllers;

use YTForum\Http\Requests;
use YTForum\Http\Controllers\Controller;

use Illuminate\Http\Request;
use YTForum\Models\Todo;

class TodosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
 
		$todos = \YTForum\Models\Todo::all();
		return $todos;
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		//Http\Request::all() should not be called statically, assuming $this 
		// $todo = Todo::create(Request::all());

		$todo = new \YTForum\Models\Todo();
		
		//Http\Request::all() should not be called statically, assuming $this 
		//$todo->create(Request::all());
		$title = $request->title;
		$todo->create($request->all());
		// $todo->save(); double record save
		// return $todo;
		return response()->json([
				"msg" => "Success",
				"id" => $todo->id,
				"title" => $title,
				"all" => $todo->toArray()
			], 200
		);
		//return print_r($request->all());
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		//Non-static method Illuminate\Http\Request::input() should not be called statically, assuming $this from incompatible context
		//$todo = Todo::find($id); 

		$todo = new Todo();
		$todo->find($id); 
		//Non-static method Illuminate\Http\Request::input() should not be called statically, assuming $this from incompatible context
		//$todo->done = Request::input('done');
		$todo->done = $request->input('done');
		$todo->save();
 
		return $todo;
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Todo::destroy($id);
	}

}
