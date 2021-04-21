<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$leads = Lead::query()
		->where('branch_id', 1)
		->orderByDesc('id')
		->get();

		return Inertia::render('Leads/Index');
	}

	 /**
	  * Store a newly created resource in storage.
	  *
	  * @param  \Illuminate\Http\Request  $request
	  * @return \Illuminate\Http\Response
	  */
	 public function store(Request $request)
	 {
		  $postData = $this->validate($request, [
				'name' => 'required',
				'email' => 'required|email',
				'dob' => 'required|date',
				'phone' => 'required'
		  ]);

		  Lead::create([
				'name' => $postData['name'],
				'email' => $postData['email'],
				'dob' => $postData['dob'],
				'phone' => $postData['phone'],
				'branch_id' => 1,
				'age' => 1,
				'interested_package' => $request['package'],
				'added_by' => Auth::user()->id,
		  ]);

		  return redirect()->route('dashboard');
	 }

	 public function create(){
		  return Inertia::render('Leads/Add');
	 }
	 /**
	  * Display the specified resource.
	  *
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function show($id)
	 {
		  //
	 }

	 /**
	  * Update the specified resource in storage.
	  *
	  * @param  \Illuminate\Http\Request  $request
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function update(Request $request, $id)
	 {
		  //
	 }

	 /**
	  * Remove the specified resource from storage.
	  *
	  * @param  int  $id
	  * @return \Illuminate\Http\Response
	  */
	 public function destroy($id)
	 {
		  //
	 }
}
