<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

use Request;
use App\Post as Announcement;
use App\Comment as Comment;
use App\User as User;
use Redirect;
use Auth;

class AnnouncementsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$announcements = Announcement::where('module_id', '=', '2')->orderBy('created_at', 'desc')->get();	
		return view('announcements.index', compact('announcements'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('announcements.create');		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Announcement::find($id);
		$comments = Comment::where('post_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('post_id', $id)->count();
		return view('announcements.details', compact('article', 'comments', 'count'));
	}

	public function acomment($id)
	{
		$comment = Request::all();
		$comment['id'] = Uuid::generate();
		$comment['user_id'] = Auth::user()->id;
		$comment['post_id'] = $id;

		Comment::create($comment);

		return Redirect::back();        
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
	}

}
