<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\Buy;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function postCreatePost(Request $request){
        $this->validate($request,['body'=>'required|max:100']);

        $post=new Post;

        $post->body=$request['body'];
        $message ='There was an error';
        if($request->user()->posts()->save($post)){
            $message='Post successfully created ';
        }

        return redirect()->route('home')->with(['message'=>$message]);

    }
    public function postCreateBuy(Request $request)
    {
        $this->validate($request, ['body' => 'required|max:100']);

        $post = new Buy;

        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created ';
        }

        return redirect()->route('buy')->with(['message' => $message]);
    }
    public function postDelete($post_id){
         $post=Post::find($post_id);
         $post->delete();

         return redirect()->back();
    }
    public function postEdit(Request $request){
       $this->validate($request,[
           'body'=>'required'
       ]);

       $post = Post::find($request['postId']);
       $post->body =$request['body'];
       $post->update();
       return response()->json(['message'=>'post edited!'],200);
   }

   public function getAccount(){
       
    return view('account',['user'=>Auth::user()]);
}
   public function postSaveAccount(Request $request){
       $this->validate($request,[
            'first_name'=>'required|max:120'
       ]);

       $user = Auth::user();
       $user->name =$request['first_name'];
       $user->update();
       $file = $request->file('image');
       $filename = $request['first_name'].'-'.$user->id.'.jpg';
       if($file){
           Storage::disk('local')->put($filename,File::get($file));
       }
       return redirect()->route('account');
           
   }
public function getUserImage($filename){
    $file=Storage::disk('local')->get($filename);
    return  new Response($file,200);
}
public function postLikePost(Request $request){
  $post_id =$request['postId'];
  $is_like =$request['isLike']==='true';
  $update=false;
  $post =Post::find($post_id);
  if(!$post){
      return null;
  }
  $user =Auth::user();
  $like= $user->likes()->where('post_id',$post_id)->first();
  if($like){
      $already_like=$like->like;
      $update=true;
      if($already_like==$is_like){
          $like->delete();
          return null;
      }
  }else{
      $like =new Like();
  }
  $like->like=$is_like;
  $like->user_id=$user->id;
  $like->post_id=$post->id;
  if($update){
    $like->update();
  }else{
      $like->save();
  }
  return null;
}

}
