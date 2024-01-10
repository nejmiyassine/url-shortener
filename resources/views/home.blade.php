@extends('layouts.app')

@section('content')
    <home-component :user_id="{{ auth()->user()->id }}"></home-component>
@endsection
