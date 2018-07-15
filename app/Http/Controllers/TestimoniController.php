<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$testimonis = Testimoni::orderBy('id', 'desc')->paginate(10);

		return view('testimonis.index', compact('testimonis'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('testimonis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$testimoni = new Testimoni();

		$testimoni->title = $request->input("title");
        $testimoni->description = $request->input("description");
        $testimoni->category = $request->input("category");

        $testimoni->url = $this->YoutubeID($request->input("url"));

		$testimoni->save();

		return redirect()->route('testimonis.index')->with('message2', 'Item created successfully.');
	}
   	public function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$testimoni = Testimoni::findOrFail($id);

		return view('testimonis.show', compact('testimoni'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$testimoni = Testimoni::findOrFail($id);

		return view('testimonis.edit', compact('testimoni'));
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
		$testimoni = Testimoni::findOrFail($id);

		$testimoni->title = $request->input("title");
        $testimoni->description = $request->input("description");
        $testimoni->category = $request->input("category");
        $testimoni->url = $this->YoutubeID($request->input("url"));

		$testimoni->save();

		return redirect()->route('testimonis.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$testimoni = Testimoni::findOrFail($id);
		$testimoni->delete();

		return redirect()->route('testimonis.index')->with('message2', 'Item deleted successfully.');
	}

}
