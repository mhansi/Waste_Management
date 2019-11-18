@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="display-2">I Want to Sell Trash</h1>
        <a style="color:green;" href="{{ route('collect') }}">Click Here</a>
    </div>
    <div class="col-md-6">
        <h1 class="display-2">I Want to Buy Trash</h1>
        <a style="color:green;" href="{{ route('buy') }}">Click Here</a>

    </div>
</div>
<img style="width:100%; height:450px;" src="./Resources/environment.jpeg">

@endsection