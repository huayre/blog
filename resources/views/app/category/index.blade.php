@extends('layouts.app')
@section('content')


    <div>
        <div class="row">
           <div class="col-md-3">
               <a href="{{route('category.create')}}" class="btn btn-primary mb-3">CREATE</a>
           </div>
            <div class="col-md-9">
               <form action="{{route('category.index')}}" method="get">
                <input class="form-control" type="text" placeholder="Shearch..." name="search">
               </form>
            </div>

        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @forelse($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->covert}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->description}}</td>
                        <td style="width: 300px">
                            <form action="{{route('category.destroy',$cat->id)}}" method="post">
                                {{method_field('DELETE')}}
                             @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{route('category.edit',$cat->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                    <tr>
                @empty
                    <tr>

                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </tr>

                @endforelse

            </tbody>
        </table>
        {{$category->links()}}
    </div>

@endsection
