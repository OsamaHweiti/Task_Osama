<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (auth()->check() && auth()->user()->role === 'admin') {
        $blogs = Blogs::all();
        $sum = count($blogs);
        return view('/admin/admindashboard', compact('blogs', 'sum'));
        }
        else
            return redirect('/')->with('Auth','ADMINS ONLY' );
    }
    public function homepage()
    {
        $blogs = Blogs::all();
        $sum = count($blogs);
        return view('home.index', compact('blogs'));
    }
    
    public function showblog($id){
        $blog = blogs::find($id);
         
    $nextBlogId = Blogs::where('id', '>', $id)->min('id');
    $previousBlogId = Blogs::where('id', '<', $id)->max('id');

    return view('home.single', compact('blog', 'nextBlogId', 'previousBlogId'));
       
    }
    public function store(Request $request)
    {
      
        // $r = $request->validate([
        //     'title' => 'required',
        //     'category' => 'required',
        //     'description' => 'required',
        //     'photo' => 'required|image',


        // ]);
        if ($request->hasFile('photo')){
        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('images/'), $final_name);
        $blogid = $request->blog_id;
        $result =  blogs::updateOrCreate(['id' => $blogid], ['title' => $request->title, 'category' => $request->category, 'description' => $request->description, 'photo' => $final_name]);
        $msg = 'Created blog successfully ' ;
    }   
    else{
        $blogid = $request->blog_id;
        $result =  blogs::updateOrCreate(['id' => $blogid], ['title' => $request->title, 'category' => $request->category, 'description' => $request->description]);
        $msg = 'Updated blog successfully ' ;
    }
        

        if ($result) {
            return redirect()->route('dashboard.index')->with('success', $msg);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blogs = blogs::find($id);
		return Response::json($blogs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    //    dd($id);
       $blog = blogs::find($id);
		return Response::json($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blogs $blogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = blogs::destroy($id);

        // $x = users::find($id)->get()->each->delete();
       
        if ($id) {
        return back()->with('success', 'Blog deleted successfully.');
        }
    }
}
