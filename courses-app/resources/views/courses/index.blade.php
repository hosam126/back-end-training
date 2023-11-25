@extends('layout.app')
@section('content')
<div class="breadcrumb">
    <div class="breadcrumb-item">
        <a href="/">Home</a>
        <a>courses</a>
    </div>
</div>
<div class="container">
    <div class="row d-flex">
        <div class="col-8">
            <h2>courses</h2>
        </div>
        <div class="col-4">
            <a href="{{route('courses.create')}}" class="btn btn-primary">Create course</a>
        </div>
        <div class="col-4">
            <form action="{{route('courses.index')}}" method="GET">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Type word and hit enter">
                </div>
            </form>

        </div>
    </div>
    <table class="table">
        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Level</th>
                <th scope="col">Price</th>
                <th scope="col">Instructor</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $x => $course)
            <tr>
                <th scope="row">{{$course->id}}</th>
                <td>{{$course->name}}</td>
                <td>{{$course->level}}</td>
                <td>{{$course->price}}</td>
                <td>{{$course->instructor}}</td>
                <td>
                <a href="{{route('courses.show',$course->id)}}" title="Show" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{route('courses.edit',$course->id)}}" title="Edit" class="btn btn-sm btn-secondary">
                        <i class="fa fa-pencil"></i>
                    </a>


                    <form style="display: unset" action="{{ route('courses.destroy', $course->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <div class="pagination justify-content-center">
                        {{$courses->links()}}
                    </div>
                </td>
            </tr>

        </tfoot>
    </table>
</div>
@endsection('content')