<?php

namespace App\Http\Controllers\admin;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index','show']]);
        $this->middleware('permission:blog-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::orderBy('id','desc')->get();
        return view('admin.advertisement.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');

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
                'title'        => 'required|max:191',
                'description'  => 'required',
                'content'      => 'required',
                'image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ],[
                'title.required' => 'حقل العنوان  مطلوب',
                'title.max' => 'حقل العنوان أكبر من اللازم',
                'description.required' => 'حقل الوصف  مطلوب',
                'content.required' => 'حقل المحتوي  مطلوب',
                'image.required' => 'حقل الصورة مطلوب',
                'image.image' => 'حقل الصورة يجب أن يكون صورة',
                'image.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
                'image.max' => 'أقصى مساحة للصوره 2 ميجابايت',

            ]);


        $input = $request->all();

        if(isset($input['image'])){
            $image = $input['image'];
            $destination = public_path('admin_assets/images/advertisement');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move($destination,$name);
            $input['image'] = $name;
        }

        Advertisement::create($input);
        Session::flash('success','تم الاضافه بنجاح');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);

        return view('admin.advertisement.show',compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);

        return view('admin.advertisement.edit',compact('advertisement'));
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
        $this->validate(request(),
            [
                'title'        => 'required|max:191',
                'description'  => 'required',
                'content'      => 'required',
                'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ],[
                'title.required' => 'حقل العنوان  مطلوب',
                'title.max' => 'حقل العنوان أكبر من اللازم',
                'description.required' => 'حقل الوصف  مطلوب',
                'content.required' => 'حقل المحتوي  مطلوب',
                'image.image' => 'حقل الصورة يجب أن يكون صورة',
                'image.mimes' => 'حقل الصورة يجب أن يكون [PNG,JPG,SVG,GIF,JPEG]',
                'image.max' => 'أقصى مساحة للصوره 2 ميجابايت',
            ]);

        $input = $request->all();
        if($advertisement = Advertisement::find($id)){

            if(isset($input['image'])){
                $path=$advertisement['image'];
                $image = $input['image'];
                $destination = public_path('admin_assets/images/advertisement');
                if(file_exists($destination.' / '.$path)){
                    unlink($destination.' / '.$path);
                }
                $name=time().'.'.$image->getClientOriginalName();
                $image->move($destination,$name);
                $input['image']=$name;
            }


            $advertisement->update($input);
            Session::flash('success','تم التعديل بنجاح');
            return redirect()->back();
        }else{
            Session::flash('danger','لم يتم التعديل ');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  Advertisement::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
