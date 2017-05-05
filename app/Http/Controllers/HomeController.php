<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use Auth;
use Image;

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
     * @return \Illuminate\Http\Response
     */

     public function profile()
     {
       return view('profile',array('user'=>Auth::user()));
     }

     public function update_avatar(Request $request)
     {
       if($request->hasFile('avatar')){
        $avatar=$request->file('avatar');
        $filename=time().'.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' .  $filename));
        $user=Auth::user();
        $user->avatar=$filename;
        $user->save();
      }

      return view('profile',array('user'=>Auth::user()));

     }
    public function index()
    {
        $posts = Post::paginate(5);
        foreach(array_chunk($posts->getCollection()->all(),3) as $row){
        foreach ($row as $post ) {
        }
      }
        return view('home',compact('posts'),array('user'=>User::find($post->user_id)));
    }

    public function create()
    {
          $posts=Post::get();
          return view('prijava.do',compact('posts'));
    }

    public function store(Request $request)
    {
        $newpost=Post::create($request->all());
        $posts=Post::get();
        return redirect('home');
    }

    public function show($id)
    {
        $user=User::find($id);
        $posts = $user->posts()->paginate(5);
        return view('prijava.ne', compact('user', 'posts'));
    }

    public function show_kom($id)
    {
      $post=Post::find($id);
      $kom=$post->comments;
      return view('kom.koment',compact('post','kom'));
    }

    public function store_kom(Request $request)
    {
      $kor=$request->post_id;
      $post=Post::find($kor);
      $newcom=Comment::create($request->all());
      $coms=Comment::get()->where('post_id', $kor);
      return redirect('/kom/'.$kor)->with('coms','post');
    }

    public function destroy($id)
    {
      Post::destroy($id);
      $user=Auth::user();
      $posts = $user->posts()->paginate(5);
      return view('prijava.ne', compact('user', 'posts'));
    }

    public function edit($id)
    {
        $post=Post::find($id);
        return view('prijava.pr',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return redirect('home');
    }
}
