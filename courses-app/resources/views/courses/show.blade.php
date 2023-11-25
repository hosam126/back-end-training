@extends('layout.app')

@section('content')
<div class="breadcrumb">
    <div class="breadcrumb-item">
        <a href="{{route('courses.index')}}">Courses</a>
        <a>{{$course->name}}</a>
    </div>
</div>
<div class="container">

    <div class="card ">
       
        <div class="card-body d-flex">
            <div class="row col-4">
                <img src="{{asset('storage/'.$course->image)}}" width="200" >
            </div>
            <div>

                <h5 class="card-title">{{$course->name}}</h5>
                <p class="card-text">{{$course->description}}</p>
                <p class="card-text">{{$course->price}} $</p>
                <p class="card-text">instructor:  {{$course->instructor}}</p>
                <p class="card-text">level:  {{$course->level}}</p>
                <a href="{{route('courses.edit',$course->id)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        
    </div>
</div>

@endsection('content')