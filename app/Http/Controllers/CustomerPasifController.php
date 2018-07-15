<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerPasif;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class CustomerPasifController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		if($user->role=="member")
			$customer_pasifs = CustomerPasif::Where('lokasi_diminati',$user->id_product)->orderBy('id', 'desc')->paginate(10);
		else
			$customer_pasifs = CustomerPasif::orderBy('id', 'desc')->paginate(10);

		foreach ($customer_pasifs as $m ) {

			$m->datetime1 = date('Y-m-d', strtotime('+30 days', strtotime($m->created_at)));
			$m->datetime2 = date('Y-m-d');
			$endTimeStamp = strtotime($m->datetime1);
			$startTimeStamp=strtotime($m->datetime2);
			$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;
				
		}					
	
		return view('customer_pasifs.index', compact('customer_pasifs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('customer_pasifs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$customer_pasif = new CustomerPasif();

		$customer_pasif->first_name = $request->input("first_name");
        $customer_pasif->middle_name = $request->input("middle_name");
        $customer_pasif->id_card = $request->input("id_card");
        $customer_pasif->no_member = $request->input("no_member");
        $customer_pasif->no_pengajuan = $request->input("no_pengajuan");
        $customer_pasif->email = $request->input("email");
        $customer_pasif->hp = $request->input("hp");
        $customer_pasif->jalan = $request->input("jalan");
        $customer_pasif->kota = $request->input("kota");
        $customer_pasif->provinsi = $request->input("provinsi");
        $customer_pasif->negara = $request->input("negara");
        $customer_pasif->kodepos = $request->input("kodepos");
        $customer_pasif->tipe_diminati = $request->input("tipe_diminati");
        $customer_pasif->lokasi_diminati = $request->input("lokasi_diminati");
        $customer_pasif->picture = $request->input("picture");

		$customer_pasif->save();

		return redirect()->route('customer_pasifs.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer_pasif = CustomerPasif::findOrFail($id);

		return view('customer_pasifs.show', compact('customer_pasif'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer_pasif = CustomerPasif::findOrFail($id);

		return view('customer_pasifs.edit', compact('customer_pasif'));
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
			'date_fee_2'=> 'required|date|date_format:Y-m-d|after:date_fee_1'
		
		]);	
		$customer_pasif = CustomerPasif::findOrFail($id);

		$customer_pasif->first_name = $request->input("first_name");
        $customer_pasif->middle_name = $request->input("middle_name");
        $customer_pasif->email = $request->input("email");
        $customer_pasif->hp = $request->input("hp");
        $customer_pasif->jalan = $request->input("jalan");
        $customer_pasif->kota = $request->input("kota");
        $customer_pasif->provinsi = $request->input("provinsi");
        $customer_pasif->negara = $request->input("negara");
		$customer_pasif->kodepos = $request->input("kodepos");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$customer_pasif->picture = '/upload/images/'.$imageName;
		}
        // $customer_pasif->picture = $request->input("picture");

		$customer_pasif->save();
		
		$pesanan= Pesanan::where('id_customer',$customer_pasif->no_pengajuan)->first();
		$pesanan->nilai_transaksi=$request->input("nilai_transaksi");
		$pesanan->no_pesanan=$request->input("no_pesanan");
		$pesanan->tipe_diminati_1=$request->input("tipe_diminati_1");//1
		$pesanan->tipe_diminati_2=$request->input("tipe_diminati_2");//2
		$pesanan->tipe_diminati_3=$request->input("tipe_diminati_3");//4
		$pesanan->tipe_diminati_4=$request->input("tipe_diminati_4");//4
		$pesanan->tipe_diminati_5=$request->input("tipe_diminati_5");//1
		$pesanan->tipe_diminati_6=$request->input("tipe_diminati_6");//1
		$pesanan->tipe_diminati_7=$request->input("tipe_diminati_7");//4

		$pesanan->date_fee_1=date($request->input("date_fee_1"));
		$pesanan->date_fee_2=date($request->input("date_fee_2"));
		$poin=0;
	
			if( $request->input("tipe_diminati_1")!=null){
				$poin+=1;
			}
			if( $request->input("tipe_diminati_2")!=null){
				$poin+=2;
			}
			if( $request->input("tipe_diminati_3")!=null){
				$poin+=4;
			}
			if( $request->input("tipe_diminati_4")!=null){
				$poin+=4;
			}
			if( $request->input("tipe_diminati_5")!=null){
				$poin+=1;
			}
			if( $request->input("tipe_diminati_6")!=null){
				$poin+=2;
			}
			if( $request->input("tipe_diminati_7")!=null){
				$poin+=4;
			}
			
			

		$pesanan->poin=$poin;
		$pesanan->closing_fee=$request->input("closing_fee");
		$nilai_transaksi=$request->input("nilai_transaksi");
		
		$pesanan->sales_fee=$nilai_transaksi*0.0125;
	

		$pesanan->save();
		return redirect()->route('customer_pasifs.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer_pasif = CustomerPasif::findOrFail($id);
		$customer_pasif->delete();

		$pesanan = Pesanan::where('id_customer',$customer_aktif->no_pengajuan)->first();
		$pesanan->delete();

		return redirect()->route('customer_pasifs.index')->with('message2', 'Item deleted successfully.');
	}

}
