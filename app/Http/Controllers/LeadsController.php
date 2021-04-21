<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lead;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{

	private $validations;

	public function __construct(){
		$this->validations =
		[
			'name' => 'required',
			'email' => 'required|email',
			'dob' => 'required|date',
			'phone' => 'required',
			'interested_package' => 'sometimes',
		];
	}

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

		return Inertia::render('Leads/Index', ['leads' => $leads]);
	}

	 /**
	  * Store a newly created resource in storage.
	  *
	  * @param  \Illuminate\Http\Request  $request
	  * @return \Illuminate\Http\Response
	  */
	 public function store(Request $request)
	 {
		  $postData = $this->validate($request, $this->validations);

		  $age = Carbon::parse($postData['dob'])->age;

		  Lead::create([
				'name' => $postData['name'],
				'email' => $postData['email'],
				'dob' => $postData['dob'],
				'age' => $age,
				'phone' => $postData['phone'],
				'branch_id' => 1,
				'interested_package' => $request['package'],
				'added_by' => Auth::user()->id,
		  ]);

		  return redirect()->route('leads');
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
		$lead = Lead::where('id', $id)->first();
		return Inertia::render('Leads/Show', ['incLead' =>  $lead]);
	}

	/**
	 * Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request)
	{
		$rules = $this->validations;
		$rules['id'] = 'required|exists:leads';

		$postData = $this->validate($request, $rules);
		$postData['age'] = Carbon::parse($postData['dob'])->age;
		Lead::where('id', $postData['id'])->update($postData);

		return redirect()->route('leads');
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
