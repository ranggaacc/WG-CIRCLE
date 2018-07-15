<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CustomerAktif;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAktifController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		if($user->role=="member")
			$customer_aktifs = CustomerAktif::Where('lokasi_diminati',$user->id_product)->orderBy('id', 'desc')->paginate(10);
		else
			$customer_aktifs = CustomerAktif::orderBy('id', 'desc')->paginate(10);

		foreach ($customer_aktifs as $m ) {

			$m->datetime1 = date('Y-m-d', strtotime('+30 days', strtotime($m->created_at)));
			$m->datetime2 = date('Y-m-d');
			$endTimeStamp = strtotime($m->datetime1);
			$startTimeStamp=strtotime($m->datetime2);
			$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;
				
		}					
	
		return view('customer_aktifs.index', compact('customer_aktifs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('customer_aktifs.create');
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

		$customer_aktif = new CustomerAktif();

		$customer_aktif->first_name = $request->input("first_name");
        $customer_aktif->middle_name = $request->input("middle_name");
        $customer_aktif->id_card = $request->input("id_card");
        $customer_aktif->no_member = $request->input("no_member");
        $customer_aktif->no_pengajuan = $request->input("no_pengajuan");
        $customer_aktif->lokasi_diminati = $request->input("lokasi_diminati");
        $customer_aktif->picture = $request->input("picture");

		$customer_aktif->save();

		return redirect()->route('customer_aktifs.index')->with('message2', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer_aktif = CustomerAktif::findOrFail($id);

		return view('customer_aktifs.show', compact('customer_aktif'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer_aktif = CustomerAktif::findOrFail($id);

		return view('customer_aktifs.edit', compact('customer_aktif'));
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
		$customer_aktif = CustomerAktif::findOrFail($id);

		$customer_aktif->first_name = $request->input("first_name");
		$customer_aktif->middle_name = $request->input("middle_name");

		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$customer_aktif->picture = '/upload/images/'.$imageName;
		}

        // $customer_aktif->picture = $request->input("picture");

		$customer_aktif->save();
		$pesanan= Pesanan::where('id_customer',$customer_aktif->no_pengajuan)->first();

		$pesanan->nilai_transaksi=$request->input("nilai_transaksi");
		$pesanan->no_pesanan=$request->input("no_pesanan");
		$pesanan->tipe_diminati_1=$request->input("tipe_diminati_1");
		$pesanan->tipe_diminati_2=$request->input("tipe_diminati_2");
		$pesanan->tipe_diminati_3=$request->input("tipe_diminati_3");
		$pesanan->tipe_diminati_4=$request->input("tipe_diminati_4");
		$pesanan->tipe_diminati_5=$request->input("tipe_diminati_5");
		$pesanan->tipe_diminati_6=$request->input("tipe_diminati_6");
		$pesanan->tipe_diminati_7=$request->input("tipe_diminati_7");
		$pesanan->date_fee_1=date($request->input("date_fee_1"));
		$pesanan->date_fee_2=date($request->input("date_fee_2"));

		$poin=0;
		$commision_fee=0;
		
		if($customer_aktif->product['segmentasi']=="middle"){
	
			if( $request->input("tipe_diminati_1")!=null){
				$poin+=1;
				$commision_fee+=1000000;
			}
			if( $request->input("tipe_diminati_2")!=null){
				$poin+=2;
				$commision_fee+=1500000;
			}
			if( $request->input("tipe_diminati_3")!=null){
				$poin+=4;
				$commision_fee+=2500000;
			}
			if( $request->input("tipe_diminati_4")!=null){
				$commision_fee+=2500000;
				$poin+=4;
			}
			if( $request->input("tipe_diminati_5")!=null){
				$commision_fee+=2500000;
				$poin+=1;
			}
			if( $request->input("tipe_diminati_6")!=null){
				$commision_fee+=2500000;
				$poin+=1;
			}
			if( $request->input("tipe_diminati_7")!=null){
				$commision_fee+=2500000;
				$poin+=4;
			}
				
				
			$pesanan->poin=$poin;
			$pesanan->closing_fee=$commision_fee;
			$pesanan->sales_fee=$request->input("nilai_transaksi")*0.0225;
	}else{

		if( $request->input("tipe_diminati_1")!=null){
			$poin+=1;
			$commision_fee+=3000000;
		}
		if( $request->input("tipe_diminati_2")!=null){
			$poin+=2;
			$commision_fee+=3500000;
		}
		if( $request->input("tipe_diminati_3")!=null){
			$poin+=4;
			$commision_fee+=4500000;
		}
		if( $request->input("tipe_diminati_4")!=null){
			$poin+=4;
			$commision_fee+=4500000;
		}
		if( $request->input("tipe_diminati_5")!=null){
			$poin+=1;
			$commision_fee+=3000000;
		}
		if( $request->input("tipe_diminati_6")!=null){
			$poin+=2;
			$commision_fee+=4500000;
		}
		if( $request->input("tipe_diminati_7")!=null){
			$poin+=4;
			$commision_fee+=4500000;
		}
			
			
		$pesanan->poin=$poin;
		$pesanan->closing_fee=$commision_fee;
		$pesanan->sales_fee=$request->input("nilai_transaksi")*0.0225;

	}
		$pesanan->save();
		return redirect()->route('customer_aktifs.index')->with('message2', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer_aktif = CustomerAktif::findOrFail($id);
		$customer_aktif->delete();

		$pesanan = Pesanan::where('id_customer',$customer_aktif->no_pengajuan)->first();
		$pesanan->delete();

		return redirect()->route('customer_aktifs.index')->with('message2', 'Item deleted successfully.');
	}

}
