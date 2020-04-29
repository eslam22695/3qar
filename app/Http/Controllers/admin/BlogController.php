<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('status',1)->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');

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
                'title'        => 'required',
                'description'  => 'required',
                'content'      => 'required',
                'image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            ]);


        $input = $request->all();

        if(isset($input['image'])){
            $image = $input['image'];
            $destination = public_path('admin_assets/images/blog');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move($destination,$name);
            $input['image'] = $name;
        }

        Blog::create($input);
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
        $blog = Blog::find($id);

        return view('admin.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('admin.blog.edit',compact('blog'));
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
                'title'        => 'required',
                'description'  => 'required',
                'content'      => 'required',
                'image'      => 'nullable'
            ]);

        $input = $request->all();
        if($blog = Blog::find($id)){

            if(isset($input['image'])){
                $path=$blog['image'];
                $image = $input['image'];
                $destination = public_path('admin_assets/images/blog');
                if(file_exists($destination.' / '.$path)){
                    unlink($destination.' / '.$path);
                }
                $name=time().'.'.$image->getClientOriginalName();
                $image->move($destination,$name);
                $input['image']=$name;
            }


            $blog->update($input);
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
        $delete =  Blog::find($id);
        $delete->delete();
        session()->flash('success','تم الحذف بنجاح');
        return back();
    }
}
