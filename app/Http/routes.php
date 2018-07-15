<?php
use App\User;
use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Front page router
Route::get('/front-page', 'PageController@homeView');

// Registration page
Route::get('/registration', 'PageController@memberRegistration');
Route::post('/addmember', 'PageController@addMember');

// Member login
Route::get('/member-login', 'PageController@memberLogin');

// Member logout
Route::get('/member-logout', 'PageController@memberLogout');

// Member login
Route::post('/member-post-login', 'PageController@memberPostLogin');

// Member dashboard
Route::get('/member-dashboard', 'PageController@memberDashboard');

// Member login
Route::get('/edit-foto-member', 'PageController@editfoto');
Route::put('/post-foto-member/{id}', 'PageController@postfoto');
// Customer aktif form
Route::get('/active-customer', 'PageController@activeCustomerForm');

// Customer pasif form
Route::get('/passive-customer', 'PageController@passiveCustomerForm');


// Customer aktif form
Route::post('/post-active-customer', 'PageController@postactiveCustomerForm');

// Customer pasif form
Route::post('/post-passive-customer', 'PageController@postpassiveCustomerForm');

// FAQ page
Route::get('/faq', 'PageController@faqView');

// SnK page
Route::get('/syarat-ketentuan', 'PageController@syaratKetentuanView');

// Kontak page
Route::get('/kontak', 'PageController@kontakView');

// News page
Route::get('/quiz', 'PageController@quizView');
Route::get('/artikel', 'PageController@artikelView');
Route::get('/event', 'PageController@eventView');
Route::get('/galeri', 'PageController@galeriView');
Route::get('/testimoni', 'PageController@testimoniView');

// News detail
Route::get('/detail/{judul}', 'PageController@newsDetailView');
Route::get('/event-detail/{judul}', 'PageController@eventDetailView');
Route::get('/galeri-detail/{judul}', 'PageController@galeriDetailView');

// Products page
Route::get('/wg-products', 'PageController@productsView');

// Product tera
Route::get('/wg-products/{id}', 'PageController@product');

// Product tera
Route::get('/wg-products/tera', 'PageController@productTera');

// Product mahogany
Route::get('/wg-products/mahogany', 'PageController@productMahogany');

// Product urbano
Route::get('/wg-products/urbano', 'PageController@productUrbano');

Route::get('/', 'PageController@homeView');
Route::get('/login-admin', 'PageController@loginadmin');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard/{proyek?}', 'DashboardController@dashboard');
    Route::get('/updateimg', 'DashboardController@updateimg');
    Route::post('/updateimgprofil', 'DashboardController@updateimgprofil');
    Route::get('/home', 'HomeController@index');
    Route::get('/user-data', 'PageController@userdata');
    Route::get('/member', 'AdminUnitController@memberdata');



    Route::resource("info_programs","InfoProgramController");
    Route::resource("infoumums","InfoUmumController");
    Route::resource("artikels","ArtikelController");
    Route::resource("products","ProductController");
    Route::resource("rewards","RewardController");
    Route::resource("galeris","GaleriController");
    Route::resource("events","EventController");
    Route::resource("customer_pasifs","CustomerPasifController");
    Route::resource("customer_aktifs","CustomerAktifController");
    Route::resource("admin_units","AdminUnitController");
    Route::resource("testimonis","TestimoniController");    
});


Route::get('/getAllUser', 'DashboardController@getAllUser');
Route::get('/getUserByEmail/{email}', 'DashboardController@getUserByEmail');
Route::auth();

//activation
Route::get('/user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

//jwt-auth
Route::group(['middleware' => ['bcors']], function () {

Route::post('/signup', function(){

    $input = Input::only('email','birthdate','password','role','name','hp','domisili','gender','status_kawin');
    $input['password'] = Hash::make($input['password']);
    $email = $input['email'];

    	if (isset($input['email']) && isset($input['birthdate']) && isset($input['password']) && isset($input['gender']) &&
			isset($input['status_kawin']) && isset($input['hp']) && isset($input['name']) 
            && isset($input['domisili'])){
			
            $user = User::where('email',$email)->first();

                    if($user){
                        return Response::json(['status'=>false,'message'=>'user already exsist']);
                    }else{
                        try {
                            $input['activated']=1;
                            $input['status']=1;
                            $inbox = new Inbox();
                            $inbox->title = "Selamat Bergabung di WG Circle Crew";
                            $inbox->description = "Haiker adalah kependekan dari Hai Baikers. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.";
                            $inbox->id_receiver = $input['email'];
                            $inbox->id_user = 'admin-haiker@gmail.com';
                            $inbox->send_at= date("Y-m-d H:i:s"); 
                            $inbox->save();
                            User::create($input);            
                        } catch (Exception $e) {
                            return Response::json(['status'=>false,'message'=>$e]);
                        }
                        return Response::json(['status'=>true,'message'=>"success created user"]);            
                    }
                    }else{
                        return Response::json(['status'=>false,'message'=>'parameter input not complete!','data'=>$input]);
                    }
        });

                    Route::post('/signin', function(){

                        $input = Input::only('email','password');
                        //$customClaims = ['name' => $user->nama, 'picture' => $user->file_foto];
                        //if (!$token = JWTAuth::attempt($input, $customClaims)) {
                        
                        if (!$token = JWTAuth::attempt($input)) {
                            return response()->json(['status'=>false,'message' => 'wrong email or password.']);
                        }
                        $user = User::Where('email',$input['email'])->first();
                        return response()->json(['status'=>true,'user'=>$user,'token' => $token]);

                    });

 });


    Route::group(['middleware' => ['bcors','jwt.auth']], function () {
        
        Route::post('/addorder','ApiController@addorder');
        Route::post('/addfeedback','ApiController@addfeedback');
        Route::delete('/deleteorder','ApiController@destroyorder');

        Route::get('/getproduct/{string?}','ApiController@getproduct');
        Route::get('/getevents/{string?}','ApiController@getevents');
        Route::get('/getexhibitions/{string?}','ApiController@getexhibitions');
        Route::get('/getbikes/{string?}','ApiController@getbikes');
        Route::get('/getreviews/{string?}','ApiController@getreviews');
        Route::get('/getinbox','ApiController@getinbox');
        Route::get('/getorder','ApiController@getorder');
        Route::get('/getvloggers/{string?}','ApiController@getvloggers');
    });
