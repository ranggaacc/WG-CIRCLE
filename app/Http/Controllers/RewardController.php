<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;
use File;

class RewardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rewards = Reward::orderBy('id', 'desc')->paginate(10);

		return view('rewards.index', compact('rewards'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('rewards.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$reward = new Reward();

		$reward->id_product = $request->input("id_product");
        $reward->name = $request->input("name");
        $reward->category = $request->input("category");
        $reward->type = $request->input("type");
        $reward->value = $request->input("value");
        $reward->status = $request->input("status");

		$reward->save();

		return redirect()->route('rewards.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reward = Reward::findOrFail($id);

		return view('rewards.show', compact('reward'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reward = Reward::findOrFail($id);

		return view('rewards.edit', compact('reward'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$reward = Reward::findOrFail($id);

		$reward->id_product = $request->input("id_product");
        $reward->name = $request->input("name");
        $reward->category = $request->input("category");
        $reward->type = $request->input("type");
		$reward->value = $request->input("value");
		$reward->status = $request->input("status");

		$reward->save();

		return redirect()->route('rewards.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$reward = Reward::findOrFail($id);
		$reward->delete();

		return redirect()->route('rewards.index')->with('message2', 'Item deleted successfully.');
	}

}
