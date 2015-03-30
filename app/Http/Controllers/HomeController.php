<?php namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\User as User;
use Laracasts\Flash\Flash;
use Redirect;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home.index');
	}

	public function bus()
	{
		return view('home.bus');
	}

	public function directory()
	{
		return view('home.directory');
	}

	public function account()
	{
		return view('home.account');
	}

		public function updateuser($id)
	{
		$update = User::find($id);
		return view('home.update', compact('update'));
	}

	public function userstore(UpdateUser $request, $id)
	{
		if(Input::file('image1') != null)
		{
			$image = Input::file('image');
			$filename = $image->getClientOriginalName();
			Input::file('image')->move(public_path().'/images/users/', $filename);
		}	
		else
		{
			$filename = User::where('id', $id)->pluck('image');
		}	

		$fname = Input::get('fistname');
		$lname = Input::get('lastname');
		$mi = Input::get('middle');
		$course = Input::get('crs');
		$contact = Input::get('cntc');

		$update = $request->all();
		$uuser = User::update($update);

		Flash::message('User updated!');
        return Redirect::back();
	}

	public function applications()
	{
		return view('home.applications');
	}

}
