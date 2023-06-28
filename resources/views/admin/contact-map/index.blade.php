@extends('admin.layouts.admin')

@section('content')
    <a class="btn btn-primary my-3" href="{{route('contact-map.create')}}">Add</a>

    <div class="card" >
        <div class="card-body" >
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Iframe</th>
                    <th>Title</th>
                    <th>Phone</th>
                    <th>Text</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->iframe}}</td>
                        <td>{{$model->title}}</td>
                        <td>{{$model->phone}}</td>
                        <td>{{$model->text}}</td>

                        <td>
                            <a class="btn bg-yellow" href="{{route('contact-map.edit',$model->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('contact-map.destroy',$model->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
        <div class="container d-flex justify-content-center">
            {{$models->links()}}
        </div>
    </div>
@endsection
