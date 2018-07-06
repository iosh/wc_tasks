@extends('layouts.app')

@section('title', 'Edit task ')

@section('content')

    <div class="row">
        <div class="col-md-5">
            <h3>Edit</h3>            
        </div>
        <div class="col-md-7 page-action text-right">            
            <a href="{{ route('tasks.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
            {!! Form::open( ['method' => 'delete', 'url' => route('tasks.destroy', ['user' => $task->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
                            <button type="submit" class="btn-delete btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($task, ['method' => 'PUT', 'route' => ['tasks.update',  $task->id ] ]) !!}
                            @include('task._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-create']) !!}
                        {!! Form::close() !!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection