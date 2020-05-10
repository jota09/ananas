@extends('layouts.app')

@section('content')

<div class="container">
    <div class="title m-b-md">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">List of Posts</div>
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Text</th>
                    <th scope="col">By</th>
                    <th scope="col">Date</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="post-list">
                @foreach ($posts as $post)
                    <tr> 
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->ptext }}</td>
                        <td>{{ $post->pby }}</td>
                        <td>{{ $post->pdate }}</td>
                        <td>
                        @if (Auth::user()->id === $post->pbyid)
                        <form id="createPost" method="POST" action="{{url('postCreate')}}">
                        @csrf
                            <input type="hidden" name="pid" id="pid" value="{{ $post->pbyid }}">
                            <input type="hidden" name="pbyid" id="pbyid" value="{{ Auth::user()->id }}">  
                            <button type="submit" class="btn btn-warning">-</button>
                        </form>
                        
                        @endif
                        </td>
                    </tr>
                @endforeach 
                </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                {{ $posts->links() }}
            </div>
        </div>        
        </div>
        </div>
        
    </div>

    
    </div>
</div>
@endsection
