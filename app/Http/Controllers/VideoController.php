<?php namespace YTForum\Http\Controllers;

use Illuminate\Http\Request;
use YTForum\Http\Controllers\Controller;


class VideoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$videos = \YTForum\Models\Video::get();
		return response()->json([
				"msg" => "Success",
				"videos" => $videos->toArray()
			], 200
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$video = new \YTForum\Models\Video();
		$video->author = $request->author;
		$video->title = $request->title;
		$video->summary = $request->summary;
		$video->save();

		return response()->json([
				"msg" => "Success",
				"id" => $video->id
			], 200
		);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request, $id)
	{
		//
		//$video = new \YTForum\Models\Video::find($id);
		$video = new \YTForum\Models\Video();
		$video->find($id);

		return response()->json([
				"msg" => "Success",
				"video" => $video->toArray()
			], 200
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		//$video = new \YTForum\Models\Video::find($id);
		$video = new \YTForum\Models\Video();
		$video->find($id);
		$video->delete();

		return response()->json([
				"msg" => "Success"
			], 200
		);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$video = new \YTForum\Models\Video();
		$video->find($id);
		
		$video->author = $request->author;
		$video->title = $request->title;
		$video->summary = $request->summary;
		$video->save();

		return response()->json([
				"msg" => "Success"
			], 200
		);
	}

}
