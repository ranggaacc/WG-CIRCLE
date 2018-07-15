<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		if($user->role=='adminunit')
			$products = Product::where('id',$user->id_product)->orderBy('id', 'desc')->paginate(10);
		else
			$products = Product::orderBy('id', 'desc')->paginate(10);

		return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name'=> 'required',
			'jenis'=> 'required',        
			'progress'=> 'required',					
			'website'=> 'required',			
			'alamat'=> 'required',
			'lokasi_lat'=> 'required',
			'lokasi_long'=> 'required',
			'marketing_book'=> 'required|mimes:pdf,jpeg,bmp,jpg,png',
			'price_list'=> 'required|mimes:jpeg,bmp,jpg,png',
			'logo'=> 'required|mimes:jpeg,bmp,jpg,png'
		]);

		$product = new Product();

		$product->kode = $request->input("kode");
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->segmentasi = $request->input("segmentasi");
        $product->jenis = $request->input("jenis");
        $product->progress = $request->input("progress");
        $product->website = $request->input("website");
        $product->lokasi_lat = $request->input("lokasi_lat");
        $product->lokasi_long = $request->input("lokasi_long");
        $product->alamat = $request->input("alamat");
		
		if ($request->hasFile('marketing_book')) {
			$imageTempName = $request->file('marketing_book')->getPathname();
			$imageName = $request->file('marketing_book')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('marketing_book')->move($path , $imageName);
			$product->marketing_book = '/upload/images/'.$imageName;
		}
		if ($request->hasFile('picture_3D')) {
			foreach ($request->file('picture_3D') as $photo) {
				$imageTempName = $photo->getPathname();
				$imageName = $photo->getClientOriginalName();
				$path = base_path() . '/public/upload/images/';
				$photo->move($path , $imageName);
				$product->picture_3D .= '/upload/images/'.$imageName.";";
			}
			$product->picture_3D = substr($product->picture_3D,0,-1);
		}
		if ($request->hasFile('price_list')) {
			$imageTempName = $request->file('price_list')->getPathname();
			$imageName = $request->file('price_list')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('price_list')->move($path , $imageName);
			$product->price_list = '/upload/images/'.$imageName;
		}
		if ($request->hasFile('logo')) {
			$imageTempName = $request->file('logo')->getPathname();
			$imageName = $request->file('logo')->getClientOriginalName();
			$path = base_path() . '/public/upload/files/';
			$request->file('logo')->move($path , $imageName);
			$product->logo = '/upload/files/'.$imageName;
		}

		$product->save();

		return redirect()->route('products.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		$string = $product->picture_3D;
		$string = explode(";",$string);
		$product->pictures = $string;

		return view('products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);

		return view('products.edit', compact('product'));
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

			$this->validate($request, [
			'name'=> 'required',
			'jenis'=> 'required',        
			'progress'=> 'required',					
			'website'=> 'required',			
			'alamat'=> 'required',
			'lokasi_lat'=> 'required',
			'lokasi_long'=> 'required',
			'marketing_book'=> 'mimes:pdf,jpeg,bmp,jpg,png',
			'price_list'=> 'mimes:jpeg,bmp,jpg,png',
			'logo'=> 'mimes:jpeg,bmp,jpg,png'
		]);

		$product = Product::findOrFail($id);

		$product->kode = $request->input("kode");
        $product->name = $request->input("name");
        $product->description = $request->input("description");
		$product->jenis = $request->input("jenis");
		$product->segmentasi = $request->input("segmentasi");
        $product->progress = $request->input("progress");
        $product->website = $request->input("website");
        $product->lokasi_lat = $request->input("lokasi_lat");
        $product->lokasi_long = $request->input("lokasi_long");
        $product->alamat = $request->input("alamat");
		
		if ($request->hasFile('marketing_book')) {
			$imageTempName = $request->file('marketing_book')->getPathname();
			$imageName = $request->file('marketing_book')->getClientOriginalName();
			$path = base_path() . '/public/upload/files/';
			$request->file('marketing_book')->move($path , $imageName);
			$product->marketing_book = '/upload/files/'.$imageName;
		}
		if ($request->hasFile('picture_3D')) {
			foreach ($request->file('picture_3D') as $photo) {
				$imageTempName = $photo->getPathname();
				$imageName = $photo->getClientOriginalName();
				$path = base_path() . '/public/upload/images/';
				$photo->move($path , $imageName);
				$product->picture_3D .= '/upload/images/'.$imageName.";";
			}
			$product->picture_3D = substr($product->picture_3D,0,-1);
		}
		if ($request->hasFile('price_list')) {
			$imageTempName = $request->file('price_list')->getPathname();
			$imageName = $request->file('price_list')->getClientOriginalName();
			$path = base_path() . '/public/upload/files/';
			$request->file('price_list')->move($path , $imageName);
			$product->price_list = '/upload/files/'.$imageName;
		}
		if ($request->hasFile('logo')) {
			$imageTempName = $request->file('logo')->getPathname();
			$imageName = $request->file('logo')->getClientOriginalName();
			$path = base_path() . '/public/upload/files/';
			$request->file('logo')->move($path , $imageName);
			$product->logo = '/upload/files/'.$imageName;
		}



		$product->save();

		return redirect()->route('products.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$product->delete();

		return redirect()->route('products.index')->with('message2', 'Item deleted successfully.');
	}

}
