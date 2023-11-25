@extends('layout.app')

@section('content')

<div class="breadcrumb">
    <div class="breadcrumb-item">
        <a href="{{route('courses.index')}}">courses</a>
        <a>Create course</a>
    </div>
</div>
<div class="container">
    <form method="post" action="{{route('courses.update',$course->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>Course Details</h2>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="courseName">course name</label>
                <input type="text" class="form-control" name="name" id="courseName" placeholder="Enter course name" value="{{$course->name}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="courseDescription">course description</label>
                <textarea class="form-control" name="description" id="courseDescription" rows="3">
                {{$course->description}}
                </textarea>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-12">
                <label for="courseImages">course Image</label>
                <!-- old image link -->
                <img src="{{asset('storage/'.$course->image)}}" width="100px" height="100px">
                <input class="form-control" name="image" type="file" id="courseImage">

            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="coursePrice">Course Price</label>
                <input type="number" class="form-control" name="price" id="coursePrice" placeholder="Enter course price" value="{{$course->price}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="courseInstructor">Course instructor</label>
                <input type="text" class="form-control" name="instructor" id="courseInstructor" placeholder="Enter course instructor" value="{{$course->instructor}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="courseLeve">Course category</label>
                <select name="level" class="form-control form-select" aria-label="Default select example">
                    <option selected>Select Level</option>
                    <option value="beginner" {{$course->level=='beginner'?'selected':''}}>Beginner</option>
                    <option value="intermediate" {{$course->level=='intermediate'?'selected':''}}>Intermediate</option>
                    <option value="advanced" {{$course->level=='advanced'?'selected':''}}>Advanced</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>



    </form>
</div>


@endsection('content')