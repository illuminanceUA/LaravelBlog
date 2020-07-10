@extends('layouts.app')
@section('content')
    <br> <br> <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <h1>Create post</h1>

                    <div class="modal-body">
                        <form name="myForm" action="{{route('/posts/add')}}" enctype="multipart/form-data" method="post" >
                                    @csrf

                                    <div class="form-group">
                                        <label for="title">Title <span class="require">*</span></label>
                                        <input type="text" class="form-control" name="title" required placeholder="Minimum 5 symbols" minlength="5" maxlength="25" />

                                    </div>

                                    <div>
                                        <h5>Text</h5>
                                        <textarea class="form-control textarea_post" id="exampleFormControlTextarea1" name="text" required placeholder="Minimum 26 symbols" minlength="26" maxlength="2048"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Featured Image <span class="required">*</span></label>
                                            <input class="form-control-file" type="file" name="image" id="exampleFormControlFile1">

                                        </div>

                                    <div>
                                        <button value="Upload" type="submit" name="upload" class="btn btn-primary submit">Submit</button>

                                    </div>
                          </form>
                    </div>
            </div>
        </div>
@stop

