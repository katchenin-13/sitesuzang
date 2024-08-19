<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Contact;
use App\Models\Newletter;
use App\Models\User;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\SampleChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {    
    //   dd(User::class);
    //     // return view('home',[
    //     //     "users" => User::class,
    //     //     "newletters" => Newletter::all(),
    //     //     "contacts" => Contact::all(),
    //     //     "candidats"=> Candidat::all(), 
    //     //     "roles" => Role::all()
    //     // ]) ;
       
    // }

    public function getStaticUser(){
        
                $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
                $month = User::select(DB::raw("Month(created_at)as month"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
               $datas =array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($month as $index=>$month){
                    $datas[$month] = $users[$index];
            }
            
            // $today_users = User::whereDate('created_at', today())->count();
            // $yesterday_users = User::whereDate('created_at', today()->subDays(1))->count();
            // $users_2_days_ago = User::whereDate('created_at', today()->subDays(2))->count();

            // $chart = new SampleChart;
            // $chart->labels(['2 days ago', 'Yesterday', 'Today']);
            // $chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);
            return view('home',[
                "users" => User::all(),
                "newletters" => Newletter::all(),
                "contacts" => Contact::all(),
                "candidats"=> Candidat::all(), 
                "roles" => Role::all()   
            ],compact('datas'));
    }
    
}
