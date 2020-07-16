<?php

namespace App\Http\Controllers;

use App\Category;
use App\Level;
use App\Players;
use App\Paid;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Image;
use File;
use Input;
use Redirect,Response;
class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tablePlayers()
    {
        if(request()->ajax()) {
           $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
               ->join('categories','players.category_id','categories.id')
               ->join('users','players.created_by','users.id')
               ->join('paids','players.paid_id','paids.id')
              ->where('players.is_delete','0')
               ->orderBy('players.reg_date', 'desc')
               ->when(Auth::user()->role==2, function ($players) {
                   return $players->where('category_id', '2');
               })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ($players->reg_end_date);
                })->editColumn('reg_end_date2', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة كافة المشتركين';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.players',compact('title','players','categories','paid','level'));
    }
    public function malePlayers()
    {
        if(request()->ajax()) {
            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','0')
                ->where('players.category_id','1')
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ($players->reg_end_date);
                })->editColumn('reg_end_date2', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين الذكور';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.maleplayers',compact('title','players','categories','paid','level'));
    }

    public function femalePlayers()
    {
        if(request()->ajax()) {
            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','0')
                ->where('players.category_id','2')
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ($players->reg_end_date);
                })->editColumn('reg_end_date2', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين الإناث';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.femaleplayers',compact('title','players','categories','paid','level'));
    }
    public function endregPlayers()
    {
        if(request()->ajax()) {
            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','0')
                ->where('players.activated_id','1')
                ->where('players.reg_end_date','<=', Carbon::today())
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ($players->reg_end_date);
                })->editColumn('reg_end_date2', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين المنتهي تسجيلهم';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.endregplayers',compact('title','players','categories','paid','level'));
    }
    public function todayPlayers()
    {
        if(request()->ajax()) {

            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','0')
                ->whereDate('players.reg_date',Carbon::today())
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
//                ->whereDay('players.created_at','=', date('d'))->get();

            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين المسجلين اليوم';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.todayplayers',compact('title','Players','categories','paid','level'));
    }

    public function publishedPlayers()
    {
        if(request()->ajax()) {
            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','0')
                ->where('players.activated_id','1')
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ($players->reg_end_date);
                })->editColumn('reg_end_date2', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين الفعالين';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.publishedplayers',compact('title','Players','categories','paid','level'));
    }

    public function deletedPlayers()
    {
        if(request()->ajax()) {
            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','1')
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين المحذوفين';
        return view('cpanel.players.deletedplayers',compact('title','Players'));
    }

    public function noPublishPlayers()
    {
        if(request()->ajax()) {
            $players= Players::select('players.*','categories.name as category_name','paids.name as paid_name','users.name as user_name')
                ->join('categories','players.category_id','categories.id')
                ->join('users','players.created_by','users.id')
                ->join('paids','players.paid_id','paids.id')
                ->where('players.is_delete','0')
                ->where('players.activated_id','0')
                ->orderBy('players.reg_date', 'desc')
                ->when(Auth::user()->role==2, function ($players) {
                    return $players->where('category_id', '2');
                })->get();
            return datatables()->of($players)
                ->editColumn('name', function (Players $players){
                    return view('cpanel.include.playersaction',compact('players'));
                })->editColumn('reg_date', function (Players $players){
                    return ArabicDate2($players->reg_date);
                })->editColumn('reg_end_date', function (Players $players) {
                    return ($players->reg_end_date);
                })->editColumn('reg_end_date2', function (Players $players) {
                    return ArabicDate2($players->reg_end_date);
                })->editColumn('user_name', function (Players $players){
                    return view('cpanel.include.userImg',compact('players'));
                })
                ->make(true);
        }

        $title='قائمة المشتركين الغير فعالين';
        $categories=Category::all();
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.nopublishplayers',compact('title','Players','categories','paid','level'));
    }

    public function addPlayersView()
    {

        $title='إضافة مشترك';
        $categories=Category::all()->when(Auth::user()->role==2, function ($categories) {
            return $categories->where('id', '2');
        });
        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.addplayers',compact('title','categories','paid','level'));
    }
    public function updatePlayersView(Players $players)
    {
        $title='تعديل بيانات المشترك';
        $categories=Category::all()->when(Auth::user()->role==2, function ($categories) {
            return $categories->where('id', '2');
        });        $paid=Paid::all();
        $level=Level::all();
        return view('cpanel.players.updateplayers',compact('players','title','categories','paid','level'));
    }
    public function archive(Request $request)
    {
        $start=$request->offset;
        $end=$request->txt;
        $archive=Players::skip($start)->take(20)->when(Auth::user()->role==2, function ($archive) {
            return $archive->where('category_id', '2');
        })->get();
        echo json_encode($archive);

    }


    public function addPlayers(Request $request)
    {
//dd($request);
        if(!File::isDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d'))) {
            File::makeDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d'), 0777, true);
        }
        if(!File::isDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/withoutwatermark')) {
            File::makeDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/withoutwatermark', 0777, true);
        }
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'الرجاء إدخال اسم المشترك',
        ]);
        $players = new Players();
        $settings=Settings::first();
        $players->name = $request->name;
        $players->weight = $request->weight;
        $players->phone = $request->phone;
        $players->bondnumber = $request->bondnumber;
        $players->category_id = $request->category_id;
        $players->paid_id = $request->paid_id;
        if ($request->paid_id==1){
            $players->paid_remainder =0;
            if (isset($request->paid_value1)) {
                $players->paid_value = $request->paid_value1;
            }else if($request->category_id==1){
                $players->paid_value = $settings->male_paid;
            }else if($request->category_id==2){
                $players->paid_value = $settings->female_paid;
            }
        }else if ($request->paid_id==2){
            if (isset($request->paid_value2)) {
                $players->paid_value = $request->paid_value2;
                $players->paid_remainder =$request->paid_remainder;
            }else if($request->category_id==1){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->male_paid;
            }else if($request->category_id==2){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->female_paid;
            }
        }else if ($request->paid_id==3){
            if($request->category_id==1){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->male_paid;
            }else if($request->category_id==2){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->female_paid;
            }

        }else{
            $players->paid_id = 1;
            if($request->category_id==1){
                $players->paid_value = $settings->male_paid;
                $players->paid_remainder =0;
            }else if($request->category_id==2){
                $players->paid_value = $settings->female_paid;
                $players->paid_remainder =0;
            }
        }
        $players->notes = $request->notes;
        if($request->reg_date!=null){
        $players->reg_date = $request->reg_date;
        }else{
            $players->reg_date = Carbon::today()->format("Y-m-d");
        }
        if($request->reg_end_date!=null){
            $players->reg_end_date = $request->reg_end_date;
        }else{
            $players->reg_end_date = Carbon::parse($request->reg_date)->addMonths(1)->format("Y-m-d");
        }



    $request->validate([
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9048',
    ]);

        /* Start upload img */
        if (isset($request->img)) {

            if (isset($request->water_img)) {
                $players_img = time() . '.' . $request->img->extension();
                $path_img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/withoutwatermark';
                $img = Image::make($request->img->getRealPath());
                $request->img->move(public_path($path_img), $players_img);
                $img->insert(public_path('watermark/logo.png'), 'center');
                $img->save(public_path('uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d').'/'.$players_img) ) ;
                $players->img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $players_img;
            }else{

                $players_img = time() . '.' . $request->img->extension();
                $img = Image::make($request->img->getRealPath());
                $img->save(public_path('uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d').'/'.$players_img) ) ;
                $players->img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $players_img;
            }
        }
        /* End upload img */

        else if(isset($request->img_archive)){
            $players->img = $request->img_archive;
            if (isset($request->water_img)) {
                $img = Image::make($request->img_archive);
                $extension = pathinfo(public_path($request->img_archive), PATHINFO_EXTENSION);
                $players_img = time() . '.' . $extension;
                $img->insert(public_path('watermark/logo.png'), 'center');
                $img->save(public_path('uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d').'/'.$players_img) ) ;
                $players->img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $players_img;
            }
        }

        if (isset($request->activated_id))
            $players->activated_id = $request->activated_id;
        if (isset($request->level_id))
            $players->level_id = $request->level_id;

        $players->created_by = auth::user()->id;

        $players->save();
        $players->order_id=$players->id;
        $players->update();

        return redirect()->back()->with('success',true);

    }


    public function updatePlayers(Request $request,Players $players){
        if(!File::isDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d'))) {
            File::makeDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d'), 0777, true);
        }
        if(!File::isDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/withoutwatermark')) {
            File::makeDirectory(public_path() . '/uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/withoutwatermark', 0777, true);
        }
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'الرجاء إدخال اسم المشترك',
        ]);
        $settings=Settings::first();
        $players->name = $request->name;
        $players->weight = $request->weight;
        $players->phone = $request->phone;
        $players->bondnumber = $request->bondnumber;
        $players->category_id = $request->category_id;
        $players->paid_id = $request->paid_id;
        if ($request->paid_id==1){
            $players->paid_remainder =0;
            if (isset($request->paid_value1)) {
                $players->paid_value = $request->paid_value1;
            }else if($request->category_id==1){
                $players->paid_value = $settings->male_paid;
            }else if($request->category_id==2){
                $players->paid_value = $settings->female_paid;
            }
        }else if ($request->paid_id==2){
            if (isset($request->paid_value2)) {
                $players->paid_value = $request->paid_value2;
                $players->paid_remainder =$request->paid_remainder;
            }else if($request->category_id==1){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->male_paid;
            }else if($request->category_id==2){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->female_paid;
            }
        }else if ($request->paid_id==3){
            if($request->category_id==1){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->male_paid;
            }else if($request->category_id==2){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->female_paid;
            }

        }
        $players->notes = $request->notes;
        $players->reg_date = $request->reg_date;
        $players->reg_end_date = $request->reg_end_date;

        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        ]);

        /* Start upload img */
        if (isset($request->img)) {

            if (isset($request->water_img)) {
                $players_img = time() . '.' . $request->img->extension();
                $path_img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/withoutwatermark';
                $img = Image::make($request->img->getRealPath());
                $request->img->move(public_path($path_img), $players_img);
                $img->insert(public_path('watermark/logo.png'), 'center');
                $img->save(public_path('uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d').'/'.$players_img) ) ;
                $players->img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $players_img;
            }else{

                $players_img = time() . '.' . $request->img->extension();
                $img = Image::make($request->img->getRealPath());
                $img->save(public_path('uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d').'/'.$players_img) ) ;
                $players->img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $players_img;
            }
        }
        /* End upload img */

        else if(isset($request->img_archive)){
            $players->img = $request->img_archive;
            if (isset($request->water_img)) {
                $img = Image::make($request->img_archive);
                $extension = pathinfo(public_path($request->img_archive), PATHINFO_EXTENSION);
                $players_img = time() . '.' . $extension;
                /* insert watermark at bottom-right corner with 10px offset */
                $img->insert(public_path('watermark/logo.png'), 'center');
                $img->save(public_path('uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d').'/'.$players_img) ) ;
                $players->img = 'uploads/players/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . $players_img;
            }
        }



        if (isset($request->activated_id))
            $players->activated_id = $request->activated_id;
        else
            $players->activated_id =0;
        if (isset($request->level_id))
            $players->level_id = $request->level_id;

        $players->updated_by=auth::user()->id;
        $players->update();

        return redirect('/players')->with('success',true);

    }
    public function store(Request $request)
    {
        $playersId = $request->players_id;
        $players = Players::findorfail($playersId);
        $players->name=$request->name;
        $players->bondnumber = $request->bondnumber;
        $players->paid_id = $request->paid_id;
        $settings=Settings::first();
        if ($request->paid_id==1){
            $players->paid_remainder =0;
            if (isset($request->paid_value1)) {
                $players->paid_value = $request->paid_value1;
            }else if($players->category_id==1){
                $players->paid_value = $settings->male_paid;
            }else if($players->category_id==2){
                $players->paid_value = $settings->female_paid;
            }
        }else if ($request->paid_id==2){
            if (isset($request->paid_value2)) {
                $players->paid_value = $request->paid_value2;
                $players->paid_remainder =$request->paid_remainder;
            }else if($players->category_id==1){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->male_paid;
            }else if($players->category_id==2){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->female_paid;
            }
        }else if ($request->paid_id==3){
            if($players->category_id==1){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->male_paid;
            }else if($players->category_id==2){
                $players->paid_value = 0;
                $players->paid_remainder =$settings->female_paid;
            }

        }
        $players->reg_date=$request->reg_date;
        $players->reg_end_date=$request->reg_end_date;
        $players->update();
        return Response::json($players);
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $players  = Players::where($where)->first();
        return Response::json($players);
    }
    public function deletePlayers($id){


        $players=Players::findorfail($id);
        $players->is_delete=1;
        $players->deleted_by=auth::user()->id;
        $players->update();
        return Response::json($players);

//        return redirect()->back()->with('success','تمت العملية بنجاح');

    }
    public function shiftDeletePlayers($id){

        $players = Players::where('id',$id)->delete();
        return Response::json($players);
    }
    public function stopPublishPlayers($id){


        $players=Players::findorfail($id);
        $players->	activated_id=0;
        $players->updated_by=auth::user()->id;
        $players->update();
        return Response::json($players);
    }
    public function rePublishPlayers($id){


        $players=Players::findorfail($id);
        $players->	activated_id=1;
        $players->updated_by=auth::user()->id;
        $players->update();
        return Response::json($players);
    }
    public function recoverPlayers($id){


        $players=Players::findorfail($id);
        $players->	is_delete=0;
        $players->updated_by=auth::user()->id;
        $players->update();
        return Response::json($players);
    }
//    public function reorder(Request $request){
//
//        $olddata=$request->oldData;
//        $newdata=$request->newData;
//
//        $players=Players::where('order_id',$olddata)->first();
//
//        if($olddata > $newdata){
//            $all_players=Players::where('order_id','<',$olddata)->where('order_id','>=',$newdata)->orderBy('order_id','desc')->get();
//            foreach ($all_players as $n){
//                $n->order_id=$n->order_id+1;
//                $n->update();
//            }
//        }else{
//            $all_players=Players::where('order_id','>',$olddata)->where('order_id','<=',$newdata)->orderBy('order_id','desc')->get();
//            foreach ($all_players as $n){
//                $n->order_id=$n->order_id-1;
//                $n->update();
//            }
//        }
//       $players->order_id=$newdata;
//        $players->update();
//
//
//        return Response::json($players);
//    }

}
