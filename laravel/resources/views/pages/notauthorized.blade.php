@extends('layouts.default')

@section('title', '| Account')

@section('content')

@if($errors->any())
<div class="callout callout-danger">
    @foreach ($errors->all() as $error)
    <h4>{{$error}}</h4>
    @endforeach
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        You are not Authorised to access this page !
    </h1>
</section>
@endsection