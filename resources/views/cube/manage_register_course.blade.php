@extends('cube.layouts.app')
@section('title',$pageTitle)
@section('mini_top_nav')
@section('pageName',$pageName)
@include('cube.includes.mini_top_nav')
@endsection
@section('content')
<div class="content">
    <div class="animated fadeIn">

		<div class="row">
	<div class="col-lg-12">
      	<div class="card">
                            <div class="card-header">
                                <strong class="card-title">Registered Courses</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Location</th>
                                            <th>Course Title</th>
                                             <th>Comment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($registered_course as $reg_course)
                                        <tr>
                                            <td class="serial">{{$loop->iteration}}.</td>
                                            <td>{{$reg_course->name}}</td>
                                            <td>{{$reg_course->email}}</td>
                                           <td>{{$reg_course->phone}}</td>
                                          <td>{{$reg_course->location}}</td>
                                          <td>{{$reg_course->courses->title}}</td>
                                          <td>{{$reg_course->comment}}</td>
                                            <td>
                                                <span class="badge badge-complete">Complete</span>
                                            </td>
                                        </tr>

                                         @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
        </div>
   	</div>
		</div>
	</div>
</div>
@endsection
