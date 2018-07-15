<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MasterData;
use App\Models\InfoUmum;
use App\Models\Testimoni;
use App\Models\Product;
use App\Models\Artikel;
use App\Models\Event;
use App\Models\Galeri;
use App\User;
use App\Models\CustomerAktif;
use App\Models\CustomerPasif;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use DateTime;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function homeView() {
		return view('page.front-page');
	}

	public function loginadmin() {
		return view('auth.login');
	}

	public function memberRegistration() {
		return view('page.registration');
	}

	public function addMember(Request $request) {

		$this->validate($request, [
			'name'=> 'required|max:50',
			'last_name'=> 'required|max:50',
			'middle_name'=> 'required|max:25',
			'sumber'=> 'required',
			'id_card'=> 'required|max:16|unique:users',
			'birthdate'=> 'required',
			'group_member'=> 'required',
			'kota'=> 'required',
			'kodepos'=> 'required',
			'norek'=> 'required',
			'bank'=> 'required',
			'atasnama'=> 'required',
			'jalan'=> 'required',
			'password' => 'required|min:6|confirmed',
			'password_confirmation'=> 'required',
			'provinsi'=> 'required',
			'negara'=> 'required',
			'email'=> 'required|email',
			'hp'=> 'required'
			]);

		$member = new User();		
		$lastUser = User::orderBy('id', 'desc')->first();;		
		$year= Date("Y");

		$member->last_name = $request->input("last_name");
		$member->name = $request->input("name");
		$member->no_member = "WGCC-".$year."-".str_pad($lastUser->id + 1, 4, '0', STR_PAD_LEFT);
        $member->middle_name = $request->input("middle_name");
        $member->id_card = $request->input("id_card");
        $member->birthdate = $request->input("birthdate");
        $member->email = $request->input("email");
        $member->hp = $request->input("hp");
        $member->norek = $request->input("norek");
        $member->bank = $request->input("bank");
        $member->password = bcrypt($request->input("password"));
        $member->atasnama = $request->input("atasnama");
        $member->npwp = $request->input("npwp");
        $member->status = 0;
        $member->activate = 1;
        $member->jalan = $request->input("jalan");
        $member->kota = $request->input("kota");
        $member->kodepos = $request->input("kodepos");
        $member->provinsi = $request->input("provinsi");
        $member->kodepos = $request->input("kodepos");
        $member->group_member = $request->input("group_member");
        $member->sumber = $request->input("sumber");
        $member->role = "member";

		$member->save();
		$this->registrationMail($member);
		
		return redirect('member-login')->with('message2', 'Member with name '.$request->input("name").' registered successfully.');
	}
	public function editfoto() {
			$user=Auth::user();
			$customers = CustomerAktif::where('no_member',$user->no_member)->get();

			$point=0;
			foreach ($customers as $m ) {

			$m->datetime1 = date('Y-m-d', strtotime('+30 days', strtotime($m->created_at)));
			$m->datetime2 = date('Y-m-d');
			$endTimeStamp = strtotime($m->datetime1);
			$startTimeStamp=strtotime($m->datetime2);
			$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;
			$point += $m->pesanan['poin'];
			}		
			$customerspasif = CustomerPasif::where('no_member',$user->no_member)->get();
			foreach ($customerspasif as $m ) {

			$m->datetime1 = date('Y-m-d', strtotime('+30 days', strtotime($m->created_at)));
			$m->datetime2 = date('Y-m-d');
			$endTimeStamp = strtotime($m->datetime1);
			$startTimeStamp=strtotime($m->datetime2);
			$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;
			$point +=$m->pesanan['poin'];
			}

		return view('page.edit-foto-member',compact('customers','customerspasif','point','user'));
	}
	public function postfoto(Request $request,$id) {
		$user = User::findOrFail($id);
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$user->picture = '/upload/images/'.$imageName;
		}
		$user->save();
		return redirect('member-dashboard');
	}
	public function registrationMail($member){
		Mail::raw('Dear Bapak/Ibu. '.$member->name.',

		Selamat, anda telah terdaftar sebagai member WG Circle dengan no. registrasi '. $member->no_member.'.'.'
				
		Info lebih lanjut klik di www.wgcircle.com
		
		WG Circle
		Your Network Your Opportunity ', function($message) use ($member)
		{

			$message->from("biro.si@wikagedung.co.id", "Administrator WG Circle");
			$message->to($member->email);			
			$message->subject("--Konfirmasi Referensi No. ".$member->no_member." --");
			//$message->public_path()."\assets\dist\img\logo-itam.png";
			//$message->attach(asset($layanan->file_skdu), ["as" => "skdu.pdf", "mime" => "pdf"]);
		});

	}

	public function sendMail($customer, $member){

		Mail::raw('Yth. '.$member->name.',

		Terimakasih telah menjadi bagian dari WG Circle dengan nomor ID '.$member->no_member.' 
		Referensi Anda,
		
		Nomor pengajuan : '.$customer->no_pengajuan.'
		Nama            : '.$customer->first_name.' '.$customer->middle_name.'
		Lokasi properti : '.$customer->product['name'].'
		Jenis referensi : '.$customer->type.'
		
		telah masuk dalam sistem kami pada tanggal '.Date('j F Y').'. 
		Masa berlaku referensi ini sampai dengan tanggal '.Date('j F Y',strtotime('+30 days')).' dan dapat diperpanjang. Silakan untuk menindaklanjuti referensi Anda
		
		Info lebih lanjut klik di www.wgcircle.com
		
		WG Circle
		Your Network Your Opportunity', function($message) use ($member,$customer)
		{
			$message->from("biro.si@wikagedung.co.id", "Administrator WG Circle");
			$message->to($member->email);			
			$message->subject("--Konfirmasi Referensi No. ".$customer->no_pengajuan." --");
			//$message->attach(asset($layanan->file_skdu), ["as" => "skdu.pdf", "mime" => "pdf"]);
		});

	}

	public function refMail($member, $nvaliddate){
		// dd($member);
		
		Mail::raw(

		'Anda sudah mereferensikan pelanggan '.$member->first_name.' di lokasi '.$member->product['name'].'dan masih memiliki '.$nvaliddate.' harı untuk closing.
		 
		
		WG Circle
		Your Network Your Opportunity', function($message) use ($member)
		{
			$message->from("biro.si@wikagedung.co.id", "Administrator WG Circle");
			$message->to($member->user);	
			$message->subject("--Konfirmasi Referensi No. ".$member->no_pengajuan." --");
			//$message->attach(asset($layanan->file_skdu), ["as" => "skdu.pdf", "mime" => "pdf"]);
		});

	}

	// public function refMailPasif($member, $nvaliddate){
		
	// 	Mail::raw(

	// 	'Anda sudah mereferensikan pelanggan '.$member->first_name.' di lokasi '.$member->product['name'].'dan masih memiliki '.$nvaliddate.' harı untuk closing.
		 
		
	// 	WG Circle
	// 	Your Network Your Opportunity', function($message) use ($member)
	// 	{
	// 		$message->from("biro.si@wikagedung.co.id", "Administrator WG Circle");
	// 		$message->to($member->email);			
	// 		$message->subject("--Konfirmasi Referensi No. ".$member->no_pengajuan." --");
	// 		//$message->attach(asset($layanan->file_skdu), ["as" => "skdu.pdf", "mime" => "pdf"]);
	// 	});

	// }

	public function memberLogin() {

		return view('page.member-login');

	}

	public function memberLogout() {

		auth()->logout();
		return view('page.member-login');
		
	}


	public function memberPostLogin(Request $request) {

		$this->validate($request, [
			'email'=> 'required|email',
			'password'=> 'required'
		]);

		if (Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
			return redirect('member-dashboard')->with('message2', 'Login succes');		
		}
		else{
			return redirect('member-login')->with('message', 'Wrong email or password');
		}
	}

	public function postactiveCustomerForm(Request $request) {
		
		$this->validate($request, [
			'first_name'=> 'required',
			'middle_name'=> 'required',        
			'id_card'=> 'required|max:16',					
			'no_member'=> 'required',			
			'telephone'=> 'required',
			'lokasi_diminati'=> 'required'
		]);

		$user = Auth::user();
		$member = new CustomerAktif();
		$pesanan = new Pesanan();			
		$year=Date("Y");

		$membercek = CustomerAktif::where('id_card',$request->input("id_card"))->where('lokasi_diminati',$request->input("lokasi_diminati"))->first();
		$validate= $this->getnvaliddate($membercek);
		// dd($validate);

		if($validate<=0){
					
			$member->middle_name = $request->input("middle_name");
			$member->first_name = $request->input("first_name");
	        $member->id_card = $request->input("id_card");
	        $member->telephone = $request->input("telephone");
	        $member->no_member = $user->no_member;
	        $member->lokasi_diminati = $request->input("lokasi_diminati");
	        $member->user = $user->email;

			$member->status = 1;
			$member->save();

			$lastUser = CustomerAktif::orderBy('id', 'desc')->first();		
			$lastUser->no_pengajuan = $user->no_member."-".str_pad($lastUser->id, 4, '0', STR_PAD_LEFT);
			$lastUser->save();

			$member->no_pengajuan=$lastUser->no_pengajuan;
			$member->type='aktif';
			$pesanan = new Pesanan();	
			$pesanan->id_customer = $lastUser->no_pengajuan;
			$pesanan->id_member = $user->no_member;	
			$pesanan->id_product=$request->input("lokasi_diminati");
			$pesanan->no_pesanan=0;
			$pesanan->nilai_transaksi=0;
			$pesanan->poin=0;
			$pesanan->closing_fee=0;
			$pesanan->sales_fee=0;
			$pesanan->save();

			$m =User::where('no_member',$member->no_member)->first();
			if($m!=null){
				$this->sendMail($member, $m);
			}

			return redirect('active-customer')->with('message2', 'Menambahkan referensi berhasil.');	

		}
		else{
			
			$this->refMail($membercek,$validate);
			return redirect('active-customer')->with('message', 'Gagal menambahkan referensi. Mohon cek email anda!');	
		}


	}

	public function postpassiveCustomerForm(Request $request) {

		$this->validate($request, [
			'first_name'=> 'required',
			'middle_name'=> 'required',        
			'id_card'=> 'required|max:30',					
			'id_member'=> 'required',			
			'hp'=> 'required',
			'email'=> 'required',
			'lokasi_diminati'=> 'required'
		]);

		$user = Auth::user();
		$member = new CustomerPasif();		
		$membercek = CustomerPasif::where('id_card',$request->input("id_card"))->where('lokasi_diminati',$request->input("lokasi_diminati"))->first();	

		$validate= $this->getnvaliddate($membercek);

		if($validate<=0){		

		$member->middle_name = $request->input("middle_name");
		$member->first_name = $request->input("first_name");
        $member->id_card = $request->input("id_card");
        $member->hp = $request->input("hp");
        $member->email = $request->input("email");
        $member->no_member = $user->no_member;
        $member->lokasi_diminati = $request->input("lokasi_diminati");
        $member->tipe_diminati = $request->input("tipe_diminati");
        $member->user = $user->email;
		$member->status = 0;
        $member->jalan = $request->input("jalan");
        $member->kota = $request->input("kota");
        $member->provinsi = $request->input("provinsi");
        $member->kodepos = $request->input("kodepos");
		$member->save();

		$lastUser = CustomerPasif::orderBy('id', 'desc')->first();
        $lastUser->no_pengajuan = $user->no_member."-".str_pad($lastUser->id + 1, 4, '0', STR_PAD_LEFT);
		$lastUser->save();

		$member->no_pengajuan=$lastUser->no_pengajuan;
		$member->type='pasif';
		$pesanan = new Pesanan();	
		$pesanan->id_customer = $lastUser->no_pengajuan;
		$pesanan->id_member = $user->no_member;	
		$pesanan->id_product=$request->input("lokasi_diminati");
		$pesanan->no_pesanan=0;
		$pesanan->nilai_transaksi=0;
		$pesanan->tipe_diminati_1=$request->input("tipe_diminati_1");
		$pesanan->tipe_diminati_2=$request->input("tipe_diminati_2");
		$pesanan->tipe_diminati_3=$request->input("tipe_diminati_3");
		$pesanan->tipe_diminati_4=$request->input("tipe_diminati_4");
		$pesanan->tipe_diminati_5=$request->input("tipe_diminati_5");
		$pesanan->tipe_diminati_6=$request->input("tipe_diminati_6");
		$pesanan->tipe_diminati_7=$request->input("tipe_diminati_7");
		$pesanan->poin=0;
		$pesanan->closing_fee=0;
		$pesanan->sales_fee=0;
		$pesanan->save();
				
		$m =User::where('no_member',$member->no_member)->first();
			if($m!=null){
				$this->sendMail($member, $m);
			}
			return redirect('passive-customer')->with('message2', 'Berhasil menambahkan referensi');	
		}
		else{

			$this->refMail($membercek,$validate);
			return redirect('passive-customer')->with('message', 'Gagal menambahkan referensi. Mohon cek email anda');	

			$member->middle_name = $request->input("middle_name");
			$member->first_name = $request->input("first_name");
	        $member->id_card = $request->input("id_card");
	        $member->hp = $request->input("hp");
	        $member->email = $request->input("email");
	        $member->no_member = $user->no_member;
	        $member->no_pengajuan = $user->no_member."-".str_pad($lastUser->id + 1, 4, '0', STR_PAD_LEFT);
	        $member->lokasi_diminati = $request->input("lokasi_diminati");
	        $member->tipe_diminati = $request->input("tipe_diminati");
	        $member->user = $user->email;
			$member->status = 0;
	        $member->jalan = $request->input("jalan");
	        $member->kota = $request->input("kota");
	        $member->provinsi = $request->input("provinsi");
	        $member->kodepos = $request->input("kodepos");
			$member->save();
			$member->type='pasif';
					
			$m =User::where('no_member',$member->no_member)->first();
				if($m!=null){
					$this->sendMail($member, $m);
				}
		}	
	}
	public function reminderMail() {
    	$getuser= User::all();
    	foreach ($getuser as $m) {
 			$customerAktif=CustomerAktif::where('no_member',$m->no_member)->get();
 			foreach ($customerAktif as $v) {
 				$validate= $this->getnvaliddate($v);
 				
 				if($validate==15){
 					$this->sendMail($v,$m);
 				}
 			}		
    	}
    }


	public function memberDashboard() {
		if (Auth::user()->role=="member") {

			$user=Auth::user();
			$customers = CustomerAktif::where('no_member',$user->no_member)->get();

			$point=0;
			foreach ($customers as $m ) {

			$m->datetime1 = date('Y-m-d', strtotime('+30 days', strtotime($m->created_at)));
			$m->datetime2 = date('Y-m-d');
			$endTimeStamp = strtotime($m->datetime1);
			$startTimeStamp=strtotime($m->datetime2);
			$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;
			$point += $m->pesanan['poin'];
			}		
			$customerspasif = CustomerPasif::where('no_member',$user->no_member)->get();
			foreach ($customerspasif as $m ) {

			$m->datetime1 = date('Y-m-d', strtotime('+30 days', strtotime($m->created_at)));
			$m->datetime2 = date('Y-m-d');
			$endTimeStamp = strtotime($m->datetime1);
			$startTimeStamp=strtotime($m->datetime2);
			$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;
			$point +=$m->pesanan['poin'];

			}			
				
			return view('page.member-dashboard',compact('customers','customerspasif','point'));

		}else{
			return view('page.member-login');
		}

	}

	public function getnvaliddate($m){
			// dd($m->created_at);
			if($m!=null){	
				$m->datetime1 = date('Y-m-d', strtotime('+30 day', strtotime($m->created_at)));
				$m->datetime2 = date('Y-m-d');
				$endTimeStamp = strtotime($m->datetime1);
				$startTimeStamp=strtotime($m->datetime2);
				$m->nvaliddate = abs($endTimeStamp - $startTimeStamp)/86400;

				return $m->nvaliddate;
			}
			else return 0;
			
			
	}

	public function activeCustomerForm() {
		$products = Product::orderBy('id', 'desc')->get();

		return view('page.active-customer',compact('products'));
	}

	public function passiveCustomerForm() {
		$products = Product::orderBy('id', 'desc')->get();
		return view('page.passive-customer',compact('products'));
	}

	public function faqView() {
		$info=InfoUmum::where('kategori','F&Q')->first();
		return view('page.faq',compact('info'));
	}

	public function syaratKetentuanView() {
		$info=InfoUmum::where('kategori','Syarat dan Ketentuan')->first();

		return view('page.syarat-ketentuan',compact('info'));
	}

	public function kontakView() {
		$info=InfoUmum::where('kategori','Alamat')->first();

		return view('page.kontak',compact('info'));
	}

	public function quizView() {
		return view('page.quiz');
	}

	public function artikelView() {
		$news = Artikel::orderBy('created_at', 'desc')->paginate(5);  
		return view('page.artikel',compact('news'));
	}

	public function eventView() {

		$events = Event::orderBy('created_at', 'desc')->paginate(5);   
		return view('page.event',compact('events'));
		
	}

	public function galeriView() {
		$news = Galeri::orderBy('created_at', 'desc')->paginate(5); 
		return view('page.galeri', compact('news'));
	}

	public function testimoniView() {
		$news = Testimoni::orderBy('created_at', 'desc')->paginate(5);  

		return view('page.testimoni', compact('news'));
	}

	public function newsDetailView($judul) {
		$new = Artikel::Where('title', $judul)->first();

		return view('page.detail',compact('new'));
	}

	public function eventDetailView($judul) {
		$new = Event::Where('title', $judul)->first();

		return view('page.detail',compact('new'));
	}

	public function galeriDetailView($judul) {
		$new = Galeri::Where('name', $judul)->first();

		return view('page.detail',compact('new'));
	}


	public function productsView() {

		$products= Product::get();
		return view('page.products',compact('products'));

	}

	public function productTera() {
		return view('page.product-tera');
	}

	public function product($id) {

		$product= Product::where('id',$id)->first();
		$string = $product->picture_3D;
		$string = explode(";",$string);
		$product->pictures = $string;
		$product->location = "https://www.google.com/maps/@".$product->lokasi_lat.",".$product->lokasi_long.",15z?hl=en-US";

		$product->location2 = "https://www.google.com/maps/place/".$product->alamat."/@".$product->lokasi_lat.",".$product->lokasi_long.",17z?hl=en-US";

		return view('page.product-tera',compact('product'));

	}

	public function productMahogany() {
		return view('page.product-mahogany');
	}

	public function productUrbano() {
		return view('page.product-urbano');
	}

	public function masterdata()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = MasterData::orderBy('id', 'desc')->paginate(10);
		}else{
			$master_datas = MasterData::orderBy('id', 'desc')->Where('user',$user->email)->Where('id_aplikasi',$user->active_app)->paginate(10);			
		}
		return view('page.master-data', compact('master_datas'));
	}
		public function retentiondata()
	{
		$datas = DB::table('retention')
		 		->join('iklan', 'iklan.id', '=', 'retention.id_iklan')
				->select(DB::raw('retention.id,iklan.name as id_iklan,id_user, date(retention.created_at) as created_at, count(id_iklan) as count'))
                ->where('retention.name','retention')
                ->groupBy('id_iklan')
                ->groupBy(DB::raw('day(retention.created_at)'))
                ->paginate(5);
		$datas_month = DB::table('retention')
		 		->join('iklan', 'iklan.id', '=', 'retention.id_iklan')
				->select(DB::raw('retention.id,iklan.name as id_iklan,id_user,monthname(retention.created_at) as created_at, count(id_iklan) as count'))
				->where('retention.name','retention')
                ->groupBy('id_iklan')
                ->groupBy(DB::raw('month(retention.created_at)'))
                ->paginate(5);

		$datas_year = DB::table('retention')
		 		->join('iklan', 'iklan.id', '=', 'retention.id_iklan')
				->select(DB::raw('retention.id,iklan.name as id_iklan,id_user,year(retention.created_at) as created_at, count(id_iklan) as count'))
				->where('retention.name','retention')
                ->groupBy('id_iklan')
                ->groupBy(DB::raw('year(retention.created_at)'))
                ->paginate(5);

		return view('page.retention-data', compact('datas','datas_month','datas_year'));
	}

		public function opendata()
	{
		$datas = DB::table('retention')
		 		->join('iklan', 'iklan.id', '=', 'retention.id_iklan')
				->select(DB::raw('retention.id,iklan.name as id_iklan,id_user, date(retention.created_at) as created_at, count(id_iklan) as count'))
                ->where('retention.name','open')
                ->groupBy('id_iklan')
                ->groupBy(DB::raw('day(retention.created_at)'))
                ->paginate(5);
		$datas_month = DB::table('retention')
		 		->join('iklan', 'iklan.id', '=', 'retention.id_iklan')
				->select(DB::raw('retention.id,iklan.name as id_iklan,id_user,monthname(retention.created_at) as created_at, count(id_iklan) as count'))
				->where('retention.name','open')
                ->groupBy('id_iklan')
                ->groupBy(DB::raw('month(retention.created_at)'))
                ->paginate(5);

		$datas_year = DB::table('retention')
		 		->join('iklan', 'iklan.id', '=', 'retention.id_iklan')
				->select(DB::raw('retention.id,iklan.name as id_iklan,id_user,year(retention.created_at) as created_at, count(id_iklan) as count'))
				->where('retention.name','open')
                ->groupBy('id_iklan')
                ->groupBy(DB::raw('year(retention.created_at)'))
                ->paginate(5);

		return view('page.open-data', compact('datas','datas_month','datas_year'));
	}


	public function userdata()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = User::orderBy('id', 'desc')->paginate(10);
		}else{
			$master_datas = User::orderBy('id', 'desc')->Where('email',$user->email)->paginate(10);			
		}
		return view('page.user-data', compact('master_datas'));
	}

	public function installday()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, imei, id_aplikasi, count(imei) as count'))
				->groupBy('imei')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, imei,  id_aplikasi,  count(imei) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('imei')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}
		return view('page.install.install-day', compact('master_datas'));
	}

	

	public function installmonth()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, imei, id_aplikasi, count(imei) as count'))
				->groupBy('imei')
				->orderBy('created_at')
				->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, imei,  id_aplikasi,  count(imei) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('imei')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}
		return view('page.install.install-month', compact('master_datas'));
	}

	public function installyear()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, imei, id_aplikasi, count(imei) as count'))
				->groupBy('imei')
				->orderBy('created_at')
				->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, imei,  id_aplikasi,  count(imei) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('imei')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}
		return view('page.install.install-year', compact('master_datas'));
	}

	//click page
	public function clickday()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, click, id_aplikasi, count(click) as count'))
				->groupBy('click')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, click,  id_aplikasi,  count(click) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('click')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);

			//$master_datas = MasterData::orderBy('id', 'desc')->Where('user',$user->email)->Where('id_aplikasi',$user->active_app)->paginate(10);			
		}
		return view('page.click.click-day', compact('master_datas'));
	}
	public function clickmonth()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, click, id_aplikasi, count(click) as count'))
				->groupBy('click')
				->orderBy('created_at')
				->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, click,  id_aplikasi,  count(click) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('click')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}
		return view('page.click.click-month', compact('master_datas'));
	}
	public function clickyear()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, click, id_aplikasi, count(click) as count'))
				->groupBy('click')
				->orderBy('created_at')
				->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, click,  id_aplikasi,  count(click) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('click')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}
		return view('page.click.click-year', compact('master_datas'));
	}

	//view page
	public function viewday()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, view, id_aplikasi, count(view) as count'))
				->groupBy('view')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, view,  id_aplikasi,  count(view) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('view')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}
		return view('page.view.view-day',compact('master_datas'));
	}

	public function viewmonth()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, view, id_aplikasi, count(view) as count'))
				->groupBy('view')
				->orderBy('created_at')
				->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, view,  id_aplikasi,  count(view) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('view')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}
		return view('page.view.view-month',compact('master_datas'));
	}

	public function viewyear()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, view, id_aplikasi, count(view) as count'))
				->groupBy('view')
				->orderBy('created_at')
				->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, view,  id_aplikasi,  count(view) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('view')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}
		return view('page.view.view-year',compact('master_datas'));
	}

	//connected page
	public function connectedday()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, connected_by,  id_aplikasi,  count(connected_by) as count'))
				->groupBy('connected_by')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, connected_by,  id_aplikasi,  count(connected_by) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('connected_by')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}
		return view('page.connected.connected-day',compact('master_datas'));
	}

	public function connectedmonth()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, connected_by, id_aplikasi, count(connected_by) as count'))
				->groupBy('connected_by')
				->orderBy('created_at')
				->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, connected_by,  id_aplikasi,  count(connected_by) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('connected_by')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}
		return view('page.connected.connected-month',compact('master_datas'));
	}

	public function connectedyear()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, connected_by, id_aplikasi, count(connected_by) as count'))
				->groupBy('connected_by')
				->orderBy('created_at')
				->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, connected_by,  id_aplikasi,  count(connected_by) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('connected_by')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}
		return view('page.connected.connected-year',compact('master_datas'));
	}

	//click page
	public function operatorday()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, operator, id_aplikasi, count(operator) as count'))
				->groupBy('operator')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, operator,  id_aplikasi,  count(operator) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('operator')
				->groupBy(DB::raw('day(created_at)'))
				->orderBy(DB::raw('day(created_at)'))
				->paginate(10);
		}
		return view('page.operator.operator-day', compact('master_datas'));
	}
	public function operatormonth()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, operator, id_aplikasi, count(operator) as count'))
				->groupBy('operator')
				->orderBy('created_at')
				->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, operator,  id_aplikasi,  count(operator) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('operator')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("MONTH(created_at)"))
				->paginate(10);
		}
		return view('page.operator.operator-month', compact('master_datas'));
	}
	public function operatoryear()
	{
		$user = Auth::user();
		if($user->role=='admin'){
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, operator, id_aplikasi, count(operator) as count'))
				->groupBy('operator')
				->orderBy('created_at')
				->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}else{
			$master_datas = DB::table('master_data')
				->select(DB::raw('created_at, operator,  id_aplikasi,  count(operator) as count'))
				->where('user', $user->email)
				->where('id_aplikasi',$user->active_app)
				->groupBy('operator')
				->orderBy('created_at')
 		        ->groupBy(DB::raw("YEAR(created_at)"))
				->paginate(10);
		}
		return view('page.operator.operator-year', compact('master_datas'));
	}
}
