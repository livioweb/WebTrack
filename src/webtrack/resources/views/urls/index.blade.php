@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('url.create') }}"> Inserir Nova URL</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($urls as $url)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $url->url }}</td>
                                <td>{{ $url->detail }}</td>
                                <td>
                                    <form action="{{ route('url.destroy',$url->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('url.show',$url->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('url.edit',$url->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
