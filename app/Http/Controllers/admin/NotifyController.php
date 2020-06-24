<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\User;
use App\Item;

class NotifyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        /* $this->middleware('permission:notify-list|notify-create|notify-edit|notify-delete', ['only' => ['index','show']]); */
        $this->middleware('permission:notify-monthly', ['only' => ['index','store']]);
        $this->middleware('permission:notify-all', ['only' => ['create','send']]);
//        $this->middleware('permission:notify-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:notify-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = now();

        $items = Item::where('notify',1)->whereMonth('date', '>', $date->month)

           ->orWhere(function ($query) use ($date) {
               $query->whereMonth('date', '=', $date->month)->whereDay('date', '>=', $date->day);
           })
           ->orderByRaw("DAYOFMONTH('date')",'ASC')
           ->get();
        return view('admin.notify.index',compact('items')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'name'  => 'required|max:191',
            'body' => 'required',
            'item_id' => 'required|exists:items,id',
        ],[
            'body.required' => 'حقل المحتوى مطلوب',
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
            'item_id.required' => 'حدث خطأ ما يرجى إعادة تحديث الصفحه',
            'item_id.exists' => 'حدث خطأ ما يرجى إعادة تحديث الصفحه',
        ]);

        $input = $request->all();


        $item = Item::find($input['item_id']);

        $recipients = [$item->user->device_id];

        fcm()
        ->to($recipients) // $recipients must an array
        ->priority('high')
        ->notification([
            'title' => $input['name'],
            'body' => $input['body'],
        ])
        ->send();

        Session::flash('success','تم الإرسال بنجاح');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $this->validate(request(),
        [
            'name'  => 'required|max:191',
            'body' => 'required',
        ],[
            'body.required' => 'حقل المحتوى مطلوب',
            'name.required' => 'حقل الاسم مطلوب',
            'name.max' => 'حقل الاسم أكبر من اللازم',
        ]);

        $input = $request->all();
        $recipients = [];

        $users = User::where('device_id', '!=', null)->where('status',1)->get();
        
        for($i=0; $i<count($users); $i++){
            $recipients = [$users[$i]->device_id];
        }
        
        fcm()
        ->to($recipients) // $recipients must an array
        ->priority('high')
        ->notification([
            'title' => $input['name'],
            'body' => $input['body'],
        ])
        ->send();

        Session::flash('success','تم الإرسال بنجاح');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
