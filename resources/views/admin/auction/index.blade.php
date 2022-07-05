@extends('layouts.admin')
@section('title', 'Product List')
@section('main')

    <form action="" class="form-inline">
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Search by name" value="">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Start Time</th>
                <th>Close Time</th>
                <th>Status</th>
                <th>Start Price</th>
                <th>Step Price</th>
                <th>highset_price</th>
                <th>winner_id</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>{{$model->name}}</td>
                    <td>{{ $model->start_time }}</td>
                    <td>{{ $model->close_time }}</td>
                    <td>
                        @if ($model->status == 0)
                            <span class="badge badge-danger">Priview</span>
                        @else
                            <span class="badge badge-success">Publish</span>
                        @endif
                    </td>
                    <td>{{ $model->start_price }}</td>
                    <td>{{ $model->step_price }}</td>
                    <td>{{ $model->highest_price }}</td>
                    <td>{{ $model->winner_id }}</td>
                    

                    <td class="text-right">
                        
                            
                            <a href="{{route('auction.edit',$model->id)}}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('auction.destroy',$model->id)}}" class="btn btn-sm btn-danger btndelete">
                                <i class="fas fa-trash"></i>
                            </a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form method="POST" action="" id="form-delete">
        @csrf @method('DELETE')
    </form>
    <hr>
    <div>
        {{ $data->appends(request()->all())->links() }}
    </div>
@stop()

@section('js')
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('bạn có chắc muốn xóa nó không')){
                $('form#form-delete').submit();
            }

        })
    </script>
@stop()
