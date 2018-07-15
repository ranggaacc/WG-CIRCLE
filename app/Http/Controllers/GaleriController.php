<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use File;

class GaleriController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galeris = Galeri::orderBy('id', 'desc')->paginate(10);

		return view('galeris.index', compact('galeris'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('galeris.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$galeri = new Galeri();

		$galeri->name = $request->input("name");
        $galeri->description = $request->input("description");
        $galeri->picture = $request->input("picture");
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$galeri->picture = '/upload/images/'.$imageName;
		}

		$galeri->save();

		return redirect()->route('galeris.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$galeri = Galeri::findOrFail($id);

		return view('galeris.show', compact('galeri'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$galeri = Galeri::findOrFail($id);

		return view('galeris.edit', compact('galeri'));
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
		$galeri = Galeri::findOrFail($id);

		$galeri->name = $request->input("name");
        $galeri->description = $request->input("description");
        $galeri->picture = $request->input("picture");
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$galeri->picture = '/upload/images/'.$imageName;
		}

		$galeri->save();

		return redirect()->route('galeris.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$galeri = Galeri::findOrFail($id);
		$galeri->delete();

		return redirect()->route('galeris.index')->with('message', 'Item deleted successfully.');
	}

}
