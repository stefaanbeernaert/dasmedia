@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Vacature</h1>
                <div class="row">
                    <div class="col-12 shadow-lg ">
                        <form action="{{route('vacatures.update',$vacature->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" name="title" class="form-control my-2"
                                       value="{{$vacature->title}}" placeholder="title...">
                            </div>
                            <div class="form-group">
                                <input type="text" name="description" class="form-control my-2"
                                       value="{{$vacature->description}}" placeholder="description...">
                            </div>
                            <div class="form-group">
                                <input type="text" name="company" class="form-control my-2"
                                       value="{{$vacature->company}}" placeholder="company...">
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control my-2"
                                       value="{{$vacature->city}}" placeholder="title...">
                            </div>
                            <select  name="type" class="form-control custom-select my-2" >
                                @foreach($types as $type)

                                    <option value="{{$type->id}}" >{{$type->name}}</option>
                                @endforeach
                            </select>
                            <div>
                                <button type="submit" class="btn btn-primary my-5">Update
                                    Vacature</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

