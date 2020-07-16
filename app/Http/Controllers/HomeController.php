<?php

namespace App\Http\Controllers;

use App\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
    public function index()
    {

//        dd($password = Hash::make('action123+0'));
        $title='لوحة التحكم';
        $players=Players::orderBy('players.reg_date', 'desc')->limit(5)->when(Auth::user()->role==2, function ($players) {
            return $players->where('category_id', '2');
        })->get();
        $total = Players::where('players.activated_id', '1')->where('players.is_delete', '0')
            ->when(Auth::user()->role==2, function ($players) {
                return $players->where('category_id', '2');
            })->count();
        if(Auth::user()->role==1){
            $male = Players::where('players.category_id', '1')->where('players.activated_id', '1')->where('players.is_delete', '0')->count();
        }
        if(Auth::user()->role==1) {
            $female = Players::where('players.category_id', '2')->where('players.activated_id', '1')->where('players.is_delete', '0')->count();
        }
        $endreg = Players::where('players.reg_end_date','<=', Carbon::today())->where('players.activated_id', '1')
            ->where('players.is_delete', '0')->when(Auth::user()->role==2, function ($players) {
                return $players->where('category_id', '2');
            })->count();
        if(Auth::user()->role==1) {
            $endregmale = Players::where('players.category_id', '1')->where('players.reg_end_date','<=', Carbon::today())->where('players.activated_id', '1')
                ->where('players.is_delete', '0')->count();
        }
        if(Auth::user()->role==1) {
            $endregfemale = Players::where('players.category_id', '2')->where('players.reg_end_date','<=', Carbon::today())->where('players.activated_id', '1')
                ->where('players.is_delete', '0')->count();
        }
        $totalpaid = Players::where('players.activated_id', '1')->where('players.is_delete', '0')->where('players.reg_end_date','>', Carbon::today())
            ->when(Auth::user()->role==2, function ($players) {
                return $players->where('category_id', '2');
            })->sum('players.paid_value');
        if(Auth::user()->role==1) {
            $malepaid = Players::where('players.category_id', '1')->where('players.activated_id', '1')
                ->where('players.reg_end_date','>', Carbon::today())->where('players.is_delete', '0')->sum('players.paid_value');
        }
        if(Auth::user()->role==1) {
            $femalepaid = Players::where('players.category_id', '2')->where('players.activated_id', '1')
                ->where('players.reg_end_date','>', Carbon::today())->where('players.is_delete', '0')->sum('players.paid_value');
        }
        $totalpaidremainder = Players::where('players.activated_id', '1')->where('players.is_delete', '0')
            ->when(Auth::user()->role==2, function ($players) {
                return $players->where('category_id', '2');
            })->sum('players.paid_remainder');
        if(Auth::user()->role==1) {
            $paidremaindermale = Players::where('players.category_id', '1')->where('players.activated_id', '1')->where('players.is_delete', '0')
                ->sum('players.paid_remainder');
        }
        if(Auth::user()->role==1) {
            $paidremainderfemale = Players::where('players.category_id', '2')->where('players.activated_id', '1')->where('players.is_delete', '0')
                ->sum('players.paid_remainder');
        }
        return view('cpanel.index',compact('title','players','total','male','female','endreg','totalpaid','malepaid',
            'femalepaid','totalpaidremainder','endregmale','endregfemale','paidremaindermale','paidremainderfemale'));
    }
}
