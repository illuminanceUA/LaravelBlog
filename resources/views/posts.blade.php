@extends('layouts.app')
@section('content')
<br><br>
<!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4">Laravel Blog
                    <small>Welcome!!!</small>
                </h1>
                <!--<div class="container">
                    <div class="row">-->
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <!--<div class="card post_card">-->

                        @isset($post['image'])
                            <img class="card-img-top" src={{ asset('/storage/' . $post['image']) }} alt="image">
                           {{-- <img src="/storage/images/{{$post->image}}">--}}
                        @endisset

                        <div class="card-body">
                            <h2 class="card-title">{{$post['title']}}</h2>
                            <p class="lead">{{$post['text']}}</p>


                            <a href="posts/{{$post['id']}}" class="btn btn-primary">Read More &rarr;</a>
                            @if(Auth::check())
                                <img class="ico_{{$post['id']}}" src="@if($post['liked_by_me'])hr.png @else hw.png @endif" style="cursor:pointer; width:20px;" onclick="setLike({{$post['id']}})">
                                <span class="badge badge-info likes_count_{{$post['id']}}">{{$post['likes']}}</span>
                            @endif

                        </div>
                        <div class="card-footer text-muted">
                            Posted by User
                            <a href="#">{{$post['user_id']}}</a>

                            <span style='padding-left:350px;'> </span><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->published_at}}

                        </div>
                    </div>
            @endforeach

            <!-- Paginate -->
                <div class="pagination justify-content-center mb-4">
                    {{$posts->links()}}
                </div>
            </div>

                <script>
                function setLike(postId)
                {
                    let src = $(".ico_" + postId).attr('src').trim();
                    let likesCount = parseInt($(".likes_count_" + postId).text());
                    if (src === "hw.png") {
                        //disliked
                        $(".ico_" + postId).attr('src', 'hr.png');
                        likesCount++;
                    } else {
                        //liked
                        $(".ico_" + postId).attr('src', 'hw.png');
                        likesCount--;
                    }
                    $(".likes_count_" + postId).text(likesCount);
                    $.post("/posts/" + postId + '/like', function (res) {
                        console.log(res);
                    })
                }
            </script>
@endsection





