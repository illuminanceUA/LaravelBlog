@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">

</head>
<br>
<br>

<body>

<div class="container">
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">User ID {{$post->id}}</a>
                </p>
                <hr>
                @isset($post['image'])
                    <img class="card-img-top" src={{ asset('/storage/' . $post['image']) }} alt="image">
                @endisset

                <hr>
                <!-- Post Content -->
                <div class="card-body">
                    <p class="lead">{{$post->text}}</p>
                </div>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        @if($post && $post->comments)
                        @foreach($post->comments as $comment)
                                <div class="card-body">
                                    <div class="block1">
                                        <p class="card-text">USER: @if(Auth::check()) @if(!$comment->user_id) Anonymous @endif {{$comment->user_id}} @else Anonymous @endif </p>
                                        <hr>
                                        <p class="card-text">COMMENT:@if(Auth::check()) {{$comment->text}} @else Please login or register to see the comments @endif</p>
                                        <hr>
                                   <p class="glyphicon glyphicon-time">Date:@if(Auth::check()) {{$comment->published_at}} @else Please login or register to see the comments @endif</p>
                                    </div>
                        </div>

                        @endforeach

                        @endif

                        <div class="footer">
                            <form name="FormComment" action="/posts/{{$post->id}}/addComment" enctype="multipart/form-data" method="post" >
                                <input class="form-control" type="hidden" name="post_id" value="{{$post->id}}" >
                                @csrf
                                <div>
                                    <textarea class="form-control textarea_comment" id="exampleFormControlTextarea1" name="text" required placeholder="Add your comment"></textarea>
                                </div>
                                <div>
                                    <br>
                                    <button value="Submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop

</body>

</html>
