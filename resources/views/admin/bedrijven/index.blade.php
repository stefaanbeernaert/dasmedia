
@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row">
            @if(Session::has('bedrijf_message'))
                <div class="col-12 alert alert-secondary alert-dismissible fade show" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg> {{session('bedrijf_message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1>Bedrijven</h1>


            <table class="table table-sm table-hover fw-light ">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Company</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>


                </tr>
                </thead>
                <tbody>
                @foreach($bedrijven as $bedrijf)

                    <tr>
                        <td>{{$bedrijf->id}}</td>
                        <td>{{$bedrijf->company}}</td>
                        <td>{{$bedrijf->created_at->diffForHumans()}}</td>
                        <td>{{$bedrijf->updated_at->diffForHumans()}}</td>
                        <td class="d-flex"> <a class="btn btn-warning me-1" href="{{route('bedrijven.edit', $bedrijf->id)}}">Edit</a>
                            @if($bedrijf->deleted_at != null)
                                <a class="btn btn-success" href="{{route('bedrijven.restore',$bedrijf->id)}}">Restore</a>
                            @else
                                <form action="{{route('bedrijven.destroy', $bedrijf->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            {{$bedrijven->links()}}
        </div>
    </div>

@endsection

