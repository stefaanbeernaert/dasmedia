
@extends('layouts.backend')
@section('content')
    <div class="col-8 offset-2">
        <h1>Create Vacature</h1>
        @if(Session::has('vacature_message'))
            <div class="col-12 alert alert-secondary alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                </svg> {{session('vacature_message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{route('vacatures.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">description:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">company:</label>
                <input type="text"  name="company" id="company" class="form-control" >
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>

            <div class="form-group">
                <label for="type"> Type</label>

                <select name="type" class="form-control custom-select" >
                    @foreach($types as $type)

                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class=" my-2  btn btn-light shadow-sm ">Submit</button>
            </div>

        </form>
        @include('includes.form_error')
    </div>
@endsection
