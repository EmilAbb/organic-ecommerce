@extends('admin.layouts.admin')
@section('content')

    <a class="btn btn-primary my-3" href="{{route('attribute.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Values</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->title}}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{route('attribute-value.index',$model->id)}}">Values</a>
                        </td>

                        <td>
                            <a class="btn btn-secondary" href="{{route('attribute.edit',$model->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('attribute.destroy',$model->id)}}" method="POST">
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
    </div>
@endsection
