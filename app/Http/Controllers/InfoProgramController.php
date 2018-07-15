<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\InfoProgram;
use Illuminate\Http\Request;
use File;

class InfoProgramController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$info_programs = InfoProgram::orderBy('id', 'desc')->paginate(10);

		return view('info_programs.index', compact('info_programs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('info_programs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$info_program = new InfoProgram();

		$info_program->title = $request->input("title");
        $info_program->description = $request->input("description");
        $info_program->jenis = $request->input("jenis");

		$info_program->save();

		return redirect()->route('info_programs.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$info_program = InfoProgram::findOrFail($id);

		return view('info_programs.show', compact('info_program'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$info_program = InfoProgram::findOrFail($id);

		return view('info_programs.edit', compact('info_program'));
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
		$info_program = InfoProgram::findOrFail($id);

		$info_program->title = $request->input("title");
        $info_program->description = $request->input("description");
        $info_program->jenis = $request->input("jenis");

		$info_program->save();

		return redirect()->route('info_programs.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$info_program = InfoProgram::findOrFail($id);
		$info_program->delete();

		return redirect()->route('info_programs.index')->with('message2', 'Item deleted successfully.');
	}

}
