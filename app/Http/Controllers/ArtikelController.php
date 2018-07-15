<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use File;


class ArtikelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$artikels = Artikel::orderBy('id', 'desc')->paginate(10);

		return view('artikels.index', compact('artikels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('artikels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$artikel = new Artikel();

		$artikel->title = $request->input("title");
        $artikel->kategori = $request->input("kategori");
        $artikel->description = $request->input("description");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$artikel->picture = '/upload/images/'.$imageName;
		}

		$artikel->save();

		return redirect()->route('artikels.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$artikel = Artikel::findOrFail($id);

		return view('artikels.show', compact('artikel'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$artikel = Artikel::findOrFail($id);

		return view('artikels.edit', compact('artikel'));
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
		$artikel = Artikel::findOrFail($id);

		$artikel->title = $request->input("title");
        $artikel->kategori = $request->input("kategori");
        $artikel->description = $request->input("description");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$artikel->picture = '/upload/images/'.$imageName;
		}

		$artikel->save();

		return redirect()->route('artikels.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$artikel = Artikel::findOrFail($id);
		$artikel->delete();

		return redirect()->route('artikels.index')->with('message2', 'Item deleted successfully.');
	}

}
