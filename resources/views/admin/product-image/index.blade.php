@extends('admin.layouts.admin')
@section('content')

    <a class="btn btn-primary my-3" href="{{route('product-image.create',$productId)}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>


                <tbody id="sortable">

                @foreach($models as $model)
                    <tr id="order-{{$model->id}}">
                        <td>{{$model->id}}</td>
                        <td><img width="100" src="{{asset('storage/'.$model->image)}}"></td>

                       <td>
                            <a class="btn btn-secondary" href="{{route('product-image.edit',$model->id)}}">Edit</a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route('product-image.destroy',$model->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable();
        } );
        $("#sortable").on('sortstop',function (event, ui){
            $.ajax({
                method: "post",
                url: "{{route('sort-product-image')}}",
                data: {
                    sortList:$("#sortable").sortable('serialize'),
                    _token:$('meta[name=csrf]').attr('content')

                }
            })
        });
    </script>
@endsection
