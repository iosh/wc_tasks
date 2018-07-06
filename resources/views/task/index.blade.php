@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Post', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
                <a href="{{ route('tasks.create') }}" class="btn btn-create btn-sm"> <i class="fa fa-tasks"></i> Create</a>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->user['name'] }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>                    
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'tasks',
                            'id' => $item->id
                        ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection