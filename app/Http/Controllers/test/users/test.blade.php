@extends('app')
@section('content')
@foreach( $first as $name)
<h1> {{ $name }}</h1>
@endforeach
@endsection 