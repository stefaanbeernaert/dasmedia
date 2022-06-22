@extends('layouts.backend')
@section('content')

    <div class="col-6">
        <h1>Edit Bedrijf</h1>

        <form action="{{route('bedrijven.update',$bedrijf->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" name="name" class="form-control"
                       value="{{$bedrijf->company}}" placeholder="Bedrijf...">
            </div>
            <div>
                <button type="submit" class="btn btn-primary my-5">Update
                    Bedrijf</button>
            </div>
        </form>
    </div>
@endsection
