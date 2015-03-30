<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

use App\Post as Org;
use App\Registration as Registration;
use Webpatser\Uuid\Uuid;
use Auth;
use Redirect;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

class OrgController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orgs = Org::where('module_id', '=', '3')->get();
		return view('org.index', compact('orgs'));
	}

	public function org()
	{
		$org = Org::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->first();
		return view('org.article', compact('org'));
	}

	public function approved()
	{
		$org = Org::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->pluck('id');
		$approved = Registration::where('post_id', $org)->where('status', '=', '1')->get();
		return view('org.approved', compact('approved'));
	}

	public function approve()
	{
		$id = Input::get('id');
		$approve = Registration::where('id', $id)->first();
		$approve->status = '1';
		$approve->update();

		Flash::message('Applicant approved!');
		return redirect('/org/applicants');
	}

	public function applicants()
	{
		$org = Org::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->pluck('id');
		$applicants = Registration::where('post_id', $org)->where('status', '=', '0')->get();
		return view('org.applicants', compact('applicants'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		$org = Org::find($id);
		if(!Auth::guest())
		{
			$registration = Registration::where('user_id', Auth::user()->id)->where('post_id', $id)->pluck('user_id');
		}
		return view('org.details', compact('org', 'registration'));		
	}

	public function register()
	{
		$register['id'] = Uuid::generate();
		$register['status'] = '0';
		$register['user_id'] = Auth::user()->id;
		$register['post_id'] = Input::get('post_id');

		Registration::create($register);
		Flash::message('Application submitted!');
        return Redirect::back();				
	}	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

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
