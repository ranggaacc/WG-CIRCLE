<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use App\Models\CustomerAktif;
use App\Models\CustomerPasif;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
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
    protected function schedule(Schedule $schedule)
    {
		$schedule->call('App\Http\Controllers\PageController@reminderMail')->everyMinute();

	// $schedule->call(function () {
    //         DB::table('recent_users')->delete();
    //     })->daily();   
		// dd($schedule);
		// 	$getuser= User::all();
    // 	foreach ($getuser as $m) {
 			// $customerAktif=CustomerAktif::where('no_member',$m->no_member)->get();
 			// foreach ($customerAktif as $v) {
 			// 	$validate= $this->getnvaliddate($v);
 				
 			// 	if($validate==15){
 			// 		// $this->sendMail($v,$m);
			 //         $schedule->call(function () {

			 //            $this->sendMail($v,$m);

			 //        })->everyMinute();
 			// 	}
 			// }		
    // 	}
   //  	$CustomerPasif=CustomerPasif::where('no_member',$finduser->no_member)->get();
			// foreach ($customerAktif as $m ) {
			// 	$validate= $this->getnvaliddate($m);

			// }		
			// foreach ($CustomerPasif as $m ) {
			// 	$validate= $this->getnvaliddate($m);	
			// }					

        // $schedule->call(function () {

        //     $this->sendMail($customer,$member);

        // })->dailyAt('13:00');
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

}
