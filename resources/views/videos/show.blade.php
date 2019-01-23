@extends('layouts.app')

@section('content')
<div class="container">
    <show-video :video="{{$video}}"></show-video>
</div>
@endsection
