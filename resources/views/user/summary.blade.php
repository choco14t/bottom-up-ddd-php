@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('new') }}" class="btn btn-primary">New User</a>
            </div>
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">UserName</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($summary as $user)
                                <tr>
                                    <td class="text-center">{{ $user->userName }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('detail', ['id' => $user->id]) }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                        <a class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection