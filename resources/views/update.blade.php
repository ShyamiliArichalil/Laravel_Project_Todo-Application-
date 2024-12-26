@extends('layout')

@section('title')
Update
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center display-4">Update Todo</h1>
        </div>
        <div class="col-md-12">
            <form method="POST" action="{{route('update',$todo->id)}}">
                @csrf
                <label for="title">Title*</label>
                <input type="text" name="title" value="{{old('title')?old('title'):$todo->title}}" id="title" class="form-control mb-2"/>
                @foreach($errors->get('title') as $err)
                    <small class="text-danger">{{$err}}</small>
                @endforeach
                <input type="submit" class="btn btn-dark btn-block" value="Update"/>
            </form>
        </div>
    </div>
</div>
@endsection

