@extends('layouts.main_page_app')
@section('title',$pageTitle)

 @section('content')
@section('top_next_nav')
 @section('bar_title',$bar_title)
@include('unit_includes.top_nav')
@endsection
@include('pages_includes.courses')
@endsection