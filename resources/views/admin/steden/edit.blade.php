@extends('layouts.backend')
@section('content')

    <div class="col-6">
        <h1>Edit city</h1>

        <form action="{{route('steden.update',$city->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" name="name" class="form-control"
                       value="{{$city->city}}" placeholder="City...">
            </div>
            <div>
                <button type="submit" class="btn btn-primary my-5">Update
                    City</button>
            </div>
        </form>
    </div>
@endsection
