@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title m-b-md">
        <component-list-apartment :list-apartment='{{ $apartaments }}'></component-list-apartment>
    </div>
</div>
@endsection
