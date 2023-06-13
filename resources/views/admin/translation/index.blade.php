@extends('admin.layouts.admin')
@section('content')

    <a class="btn btn-primary my-3" href="{{route('translation.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($translations as $translation)
                    <tr>
                        <td>{{$translation->id}}</td>
                        <td>{{$translation->key}}</td>
                        <td>{{$translation->value}}</td>

                        <td>
                            <a class="btn btn-secondary" href="{{route('translation.edit',$translation->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('translation.destroy',$translation->id)}}" method="POST">
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
