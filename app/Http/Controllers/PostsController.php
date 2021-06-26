<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blogs;

class PostsController extends Controller
{
    public function create(){
        return view('pages.create');
    }

    public function saveBlog(Request $request){
        $rules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $image =  $request->file('image');
            $imageName = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $image->move('./storage/profileImages/', $imageName); 
            Blogs::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'image' => $imageName
            ]);
            return redirect('/')->with('status','Post Created Successfully');
        }
    }

    public function allBlogs(){
        $posts = Blogs::all()->sortByDesc("id");
        return view('pages.allblogs')->with('posts',$posts);
    }

    public function showBlog($id){
        $post = Blogs::findOrFail($id);
        return view('pages.display')->with('post',$post);
    }

}
