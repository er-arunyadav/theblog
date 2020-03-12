<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Category;
use App\Post;
use App\PostCategory;
use Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required'
        ]);

        


       
        // 

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' =>$request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
        ]);

        $post->categories()->attach($request->category_id);

        // foreach ($request->category_id as $category_id) {

        //     $store = PostCategory::create([
        //        'category_id'  => $category_id,
        //        'post_id'   => $post->id  
        //     ]);
        // }


        Session::flash('success','Post created succesfully');

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
        //
    }

    public function filter(Request $request){
        
       $date = $request->date;
       $newDate = date("Y-m-d", strtotime($date));
       $posts = Post::whereRaw('DATE(created_at) = '."'".$newDate."'")->get();
       $content = '';
       foreach($posts as $post){

            $content .= '<div class="card" style="width:400px">
          <img class="card-img-top" src="'.$post->featured.'" alt="Card image">
          <div class="card-body">
            <h4 class="card-title">'.$post->title.'</h4>
            <p class="card-text">'.$post->content.'</p>
            
          </div>
        </div>'; 
       }
        
     return $content;
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
