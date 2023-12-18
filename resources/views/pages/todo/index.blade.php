@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center ">
            <h1 class="page-title">My Todo List</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form">
                @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="Enter Task" >
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-success">Submit</button>

                </div>

            </div>
            </form>
        </div>
        <div class="col-lg-12">
            <div>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($tasks as $key => $task)

                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $task->title }}</td>
                        <td>
                            @if ($task->done == 0)
                            <span class="badge badge-warning">Not Completed</span>
                            @else
                            <span class="badge badge-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            <a href="{{ route('todo.done',$task->id) }}" class="btn btn-success"><i class="fa-solid fa-square-check"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    {{--  <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thronton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>  --}}
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@push('css')
<style>
    .page-title{
        padding-top: 10vh;
        font-size: 5rem;
        color: #18bb56;
    }
</style>
@endpush
