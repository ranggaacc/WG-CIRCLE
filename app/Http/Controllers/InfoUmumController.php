<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\InfoUmum;
use Illuminate\Http\Request;
use File;


class InfoUmumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$infoumums = InfoUmum::orderBy('id', 'desc')->paginate(10);

		return view('infoumums.index', compact('infoumums'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('infoumums.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$InfoUmum = new InfoUmum();

		$InfoUmum->title = $request->input("title");
        $InfoUmum->kategori = $request->input("kategori");
		$InfoUmum->description = $request->input("description");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$InfoUmum->picture = '/upload/images/'.$imageName;
		}

		$InfoUmum->save();

		return redirect()->route('infoumums.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$infoumum = InfoUmum::findOrFail($id);

		return view('infoumums.show', compact('infoumum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$infoumum = InfoUmum::findOrFail($id);

		return view('infoumums.edit', compact('infoumum'));
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
		$InfoUmum = InfoUmum::findOrFail($id);

		$InfoUmum->title = $request->input("title");
        $InfoUmum->kategori = $request->input("kategori");
        $InfoUmum->description = $request->input("description");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$InfoUmum->picture = '/upload/images/'.$imageName;
		}

		$InfoUmum->save();

		return redirect()->route('infoumums.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$InfoUmum = InfoUmum::findOrFail($id);
		$InfoUmum->delete();

		return redirect()->route('infoumums.index')->with('message2', 'Item deleted successfully.');
	}

}
