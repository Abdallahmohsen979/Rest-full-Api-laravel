@extends('layouts.app');

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{!! Form::open(['route' => 'phones.store']) !!}
<div class="form-group">
    {{ Form::label('Phone','Phone', ['class' => 'control-label']) }}
    {{ Form::text('phone', null, array_merge(['class' => 'form-control'])) }}
</div>
{{Form::submit('Submet',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection
