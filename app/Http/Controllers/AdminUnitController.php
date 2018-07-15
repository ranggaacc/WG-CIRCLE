<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use App\Models\AdminUnit;
use App\User;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminUnitController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$admin_units = AdminUnit::Where('role','adminunit')->orderBy('id', 'desc')->paginate(10);

		return view('admin_units.index', compact('admin_units'));
	}

	public function memberdata()
	{
		$admin_units = User::Where('role','member')->orderBy('id', 'desc')->paginate(10);

		return view('admin_units.index-member', compact('admin_units'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$products = Product::get(); 
		return view('admin_units.create', compact('products'));
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
			'email'=> 'required|email',
			'password'=> 'required',
			'name'=> 'required',
			'hp'=> 'required',
			'id_product'=> 'required|max:12',			
		]);

		$admin_unit = new AdminUnit();

		$admin_unit->name = $request->input("name");
        $admin_unit->id_card = $request->input("id_card");
        $admin_unit->email = $request->input("email");
        $admin_unit->hp = $request->input("hp");
        $admin_unit->jalan = $request->input("jalan");
        $admin_unit->kota = $request->input("kota");
        $admin_unit->provinsi = $request->input("provinsi");
        $admin_unit->id_product = $request->input("id_product");
        $admin_unit->kodepos = $request->input("kodepos");
        $admin_unit->birthdate = $request->input("birthdate");
        $admin_unit->role = "adminunit";
        $admin_unit->password = bcrypt($request->input("password"));
        $admin_unit->gender = $request->input("gender");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$admin_unit->picture = '/upload/images/'.$imageName;
		}

		$admin_unit->save();

		return redirect()->route('admin_units.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$admin_unit = AdminUnit::findOrFail($id);

		return view('admin_units.show', compact('admin_unit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$admin_unit = AdminUnit::findOrFail($id);
		$products = Product::get(); 

		return view('admin_units.edit', compact('admin_unit','products'));
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
			'email'=> 'required|email',
			'password'=> 'required',
			'name'=> 'required',
			'hp'=> 'required',
			'id_product'=> 'required|max:12',			
		]);

		$admin_unit = AdminUnit::findOrFail($id);

		$admin_unit->name = $request->input("name");
        $admin_unit->id_card = $request->input("id_card");
        $admin_unit->email = $request->input("email");
        $admin_unit->hp = $request->input("hp");
        $admin_unit->jalan = $request->input("jalan");
        $admin_unit->kota = $request->input("kota");
        $admin_unit->provinsi = $request->input("provinsi");
        $admin_unit->id_product = $request->input("id_product");
        $admin_unit->kodepos = $request->input("kodepos");
        $admin_unit->birthdate = $request->input("birthdate");
        $admin_unit->role = "adminunit";
        $admin_unit->password = bcrypt($request->input("password"));
        $admin_unit->gender = $request->input("gender");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$admin_unit->picture = '/upload/images/'.$imageName;
		}

		$admin_unit->save();

		return redirect()->route('admin_units.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin_unit = AdminUnit::findOrFail($id);
		$admin_unit->delete();
		if($admin_unit->role=="member")
			return redirect()->action('AdminUnitController@memberdata')->with('message2', 'Item deleted successfully.');
		else
			return redirect()->route('admin_units.index')->with('message2', 'Item deleted successfully.');
	}

}
