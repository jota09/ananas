@extends('layouts.app')


@section('content')
<div class="container">
    <div class="title m-b-md">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">Create post</div>
            <div class="card-body">
            <form id="createPost" method="POST" action="{{url('postList')}}">
            @csrf
                <div class="form-group">
                    <label for="ptext">Post Text</label>
                    <textarea class="form-control" name="ptext" id="ptext" rows="3" maxlength="450"></textarea>
                </div> 
                <input type="hidden" name="pby" id="pby" value="{{ Auth::user()->name }}">
                <input type="hidden" name="pbyid" id="pbyid" value="{{ Auth::user()->id }}">  
                <input type="hidden" name="action" id="action" value="create"> 
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
            </div>
        </div>        
        </div>
        </div>
        
    </div>

    
    </div>
</div>
@endsection
