@extends('layouts.app')

@section('content')
@include('includes.message-block')
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h3>What do you want to say?</h3>
        </header>
        <form method="post" action="/createbuy">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" placeholder="your Post" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create Post</button>
        </form>
    </div>
</section>
<section class="row posts">
    <div class="col-md-6 col-md-offset-3 ">
        <header>
            <h3>What other people say..</h3>
        </header>
        @foreach($posts as $post)

        <article class="post container " data-postid="{{$post->id}}">

            <p class="postBody text-dark" name="new-body">{{$post->body}}</p>
            <div class="info ">
                Posted by {{$post->user->name}} on {{$post->created_at}}
            </div>
            <div class="interaction">
                <a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first()? Auth::user()->likes()->where('post_id',$post->id)->first()->like==1?'You like this post':'Like':'Like'}}</a>
                <a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first()? Auth::user()->likes()->where('post_id',$post->id)->first()->like==0?'You don\'t like this post':'Dislike':'Dislike'}}</a>
                @if(Auth::user()==$post->user)
                <a class="edit" href="#">Edit</a>
                <a href="/delete/{{$post->id}}">Delete</a>

                @endif
            </div>
        </article>
        @endforeach

    </div>
</section>


<div class="modal" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>

                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>

                        </div>
                    </form>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="modal-save" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{Session::token() }}';
    var urlEdit = '{{ route('edit')}}';
    var urlLike = '{{ route('like')}}';
</script>
@endsection