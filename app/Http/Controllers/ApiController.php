<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient;
use JWTAuth;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller {
	
	
	public function getproduct(Request $request, $string=null)
	{
			$user = JWTAuth::parseToken()->toUser();
			
			if($string!=null)
				$products = Product::Where('name','like','%'.$string.'%')->orderBy('id', 'desc')->get();
			else
				$products = Product::orderBy('id', 'desc')->get();
			$status=true;
			return compact('status','products','string');
	}

	public function getinbox(Request $request)
	{
			$user = JWTAuth::parseToken()->toUser();		
			$inbox = Inbox::Where('id_receiver',$user->email)->orderBy('created_at', 'desc')->get();
            foreach ($inbox as $model){
				$model->product = Product::Where('id',$model->kode_produk)->first();
			}
			$status=true;
			return compact('status','inbox');
	}

	public function getorder(Request $request)
	{
			$user = JWTAuth::parseToken()->toUser();		
			$order = Order::Where('user',$user->email)->orderBy('created_at', 'desc')->get();
			$status=true;
			return compact('status','order');
	}

		public function getbikes(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = JWTAuth::parseToken()->toUser();
			if($string!=null)
				$bikes = Bike::Where('name','like','%'.$string.'%')->orderBy('id', 'desc')->get();
			else

				$bikes = Bike::orderBy('id', 'desc')->get();
			$status=true;
			return compact('status','bikes');
	}

	public function feedbacks()
	{
		$user = Auth::user();
		$feedbacks = Feedback::orderBy('id', 'desc')->paginate(5);
		return view('feedback.index', compact('user','feedbacks'));

	}


		public function getreviews(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = JWTAuth::parseToken()->toUser();
			if($string!=null)
				$reviews = Reviews::Where('name','like','%'.$string.'%')->orderBy('id', 'desc')->get();
			else
				$reviews= Reviews::orderBy('id', 'desc')->get();
			$status=true;
			return compact('status','reviews');
	}

		public function getevents(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = JWTAuth::parseToken()->toUser();
			if($string!=null)
				$rundowns = Event::Where('name','like','%'.$string.'%')->orderBy('created_at', 'asc')->get();
			else
				$rundowns = Event::orderBy('created_at', 'asc')->get();
			$status=true;
			return compact('status','rundowns');
	}

		public function getexhibitions(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = JWTAuth::parseToken()->toUser();
			if($string!=null)
				$exhibitions = Exhibition::Where('name','like','%'.$string.'%')->orderBy('id', 'desc')->get();
			else
				$exhibitions = Exhibition::orderBy('id', 'desc')->get();
			$status=true;
			return compact('exhibitions','status');
	}

		public function getvloggers(Request $request,  $string=null)
	{
			$token = $request->header('Api-key');
			$user = JWTAuth::parseToken()->toUser();
			if($string!=null)
				$vloggers = Vlogger::Where('name','like','%'.$string.'%')->orderBy('id', 'desc')->get();
			else
				$vloggers = Vlogger::orderBy('id', 'desc')->get();
			$status=true;
			return compact('status','vloggers');
	}

			
	public function checkSig(&$params,$package)
		{
		$SALT = 'q5u12e4iu13l8c79';
		$IV = 'rmfo9xuc4q2oawbr';
		$keys = array_keys($params);
		$value = '';
		asort($keys);
		foreach ($keys as $k){
			$value.=$params[$k];
		}
		$value.=strtolower($package);
		$value.=$SALT;
		$md5 = md5($value);
		return $md5;
	}
	
	
	public function hashFiled($appsid,$imei,$tmp)
		{
		$md5 = md5($appsid.''.$imei.''.$tmp);
		return $md5;
	}
	
	function decrypyptImei($imei,$package)
		{
		$SALT = 'q5u12e4iu13l8c79';
		$IV = 'rmfo9xuc4q2oawbr';
		$key = md5($SALT.strtolower($package));
		$chiper = base64_decode($imei);
		if (!$chiper)return False;
		return openssl_decrypt($chiper, 'AES-128-CBC', $key, OPENSSL_RAW_DATA,$IV);
	}
	
	public function getImeiEncrypt(Request $request){
		$token = $request->header('Api-key');
		$apps = Aplikasi::Where("token",$token)->first();
		$status = true;
		$params = $request->input();
		$sig;
		$data = new Order();
		if($token!=null){
			if($apps!=null){
				$user = User::Where('email',$apps->user)->first();
				if (isset($request['i'])){
					$imei = $request['i'];
					$data = $this->encrypyptImei($imei,$apps->package);
					$sig = $this->checkSig($params, $apps->package);
				}
				else{
					$status = false;
					$data = "retention not valid";
				}
			}
			else{
				$status = false;
				$data = "token not valid";
			}
		}
		else{
			$status = false;
			$data = "header parameter not complete";
		}
		return compact('status','data','sig','apps');
	}
	
	public function encrypyptImei($imei,$package)
		{
		$SALT = 'q5u12e4iu13l8c79';
		$IV = 'rmfo9xuc4q2oawbr';
		$key = md5($SALT.strtolower($package));
		$chiper = openssl_encrypt($imei,  'AES-128-CBC', $key, OPENSSL_RAW_DATA,$IV);
		return base64_encode($chiper);
	}
	
	/**
	* Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return Response
		 */
	
	public function addorder(Request $request)
		{
		$token = $request->header('Api-key');
		$user = JWTAuth::parseToken()->toUser();
		$status = true;
		$data = new Order();
		if($user!=null){
				if (isset($request['id_product']) && isset($request['qty'])
								&& isset($request['amount']) && isset($request['note']) 
								&& isset($request['address'])){
				
				$data->id = $request->input("id");
				$data->user = $user->email;
				$data->kode_product = $request->input("id_product");
				$pass = substr(md5(uniqid(mt_rand(), true)) , 0, 12);
				$merchant = substr(md5(uniqid(mt_rand(), true)) , 0, 12);
				$data->kode_order = $pass;
				$data->kode_merchant = $merchant;
				$data->amount = $request->input("amount")*$request->input("qty");
				$data->quantity = $request->input("qty");
				$data->delivery_address = $request->input("address");
				$data->note = $request->input("note");
				$data->status =0;
				$data->save();
				
				$inbox = new Inbox();
				$inbox->title = "Order dengan kode ".$pass."";
				$inbox->description = "Hai ".$user->name.". Order kamu dengan product kode ".$request->input("id_product")." sebanyak ".$data->quantity." item telah kami terima dan akan kami proses. Terima kasih";
				$inbox->id_receiver = $user->email;
				$inbox->kode_produk = $request->input("id_product");
				$inbox->id_user = 'admin-haiker@gmail.com';
				$inbox->send_at= date("Y-m-d H:i:s"); 
				$inbox->save();

				$message = "success add order";

			}
			else{
				$status = false;
				$message = "parameter not complete";
			}
		}
		else{
			$status = false;
			$master_datum = "user has no access";
		}
		return compact('status','message');
	}
	
		public function addfeedback(Request $request)
		{
		$token = $request->header('Api-key');
		$user = JWTAuth::parseToken()->toUser();
		$status = true;
		$data = new Feedback();
		if($user!=null){
				if (isset($request['title'])&& isset($request['description'])){
				
				$data->id = $request->input("id");
				$data->user = $user->email;
				$data->title = $request->input("title");
				$data->description = $request->input("description");
				$data->save();

				$message = "success add feedback";

			}
			else{
				$status = false;
				$message = "parameter not complete";
			}
		}
		else{
			$status = false;
			$master_datum = "user has no access";
		}
		return compact('status','message');
	}

	
	/**
	* Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($id)
		{

		$order = Order::findOrFail($id);		
		return view('order.show', compact('order'));
	}
	
	
	/**
	* Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
		$master_datum = Order::findOrFail($id);
		
		return view('order.edit', compact('master_datum'));
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
					'c' => 'required',
					'i' => 'required',
					'n' => 'required',
					'w' => 'required',
					'o' => 'required',
					'a' => 'required',
					'b' => 'required'
				]);
		
		$tr = new TranslateClient();
		// 		Default is from 'auto' to 'en'
				$tr->setSource('en');
		// 		Translate from English
				$tr->setTarget('id');
		// 		Translate to Indonesian
		
		$master_datum = Order::findOrFail($id);
		
		$ip = $request->input("ip");
		$detail = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
		$master_datum->id = $request->input("id");
		$master_datum->ip = $request->input("ip");
		$master_datum->user = "drikdoank@gmail.com";
		$master_datum->imei = $request->input("i");
		$master_datum->operator = $request->input("n");
		$master_datum->id_aplikasi = "1";
		$master_datum->connected_by=$request->input("w");
		$master_datum->created_at = $request->input("created_at");
		$master_datum->updated_at = $request->input("updated_at");
		$master_datum->click = $request->input("c");
		$master_datum->os = $request->input("o");
		$master_datum->view = $request->input("a");
		$master_datum->type_device = $request->input("b");
		$master_datum->language = $detail->country;
		
		$reg_indo=$tr->translate($detail->region);
		$master_datum->state = $reg_indo;
		
		$master_datum->regional = $detail->city;
		$master_datum->loc = $detail->loc;
		$master_datum->save();
		
		return redirect()->route('order.index')->with('message', 'Item updated successfully.');
	}
	
	
	/**
	* Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroyorder(Request $request)
		{
			$id = $request->input("id");
			$data = Order::find($id);
			if($data){
				$status = $data->delete();
				$message="Success delete order id ".$id;
			}
			else{
				$status=false;
				$message="Failed delete order id ".$id.". Data not found";
			}
			return compact('status','message');

	}
	
}
