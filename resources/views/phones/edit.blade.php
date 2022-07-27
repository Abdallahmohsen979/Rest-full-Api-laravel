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
{!! Form::model($phone,['route' => ['phones.update',$phone->id],'method'=>'PUT']) !!}
<div class="form-group">
    {{ Form::label('Phone','Update Phone', ['class' => 'control-label']) }}
    {{ Form::text('phone',null, ['class' => 'form-control'])}}
</div>
{{Form::submit('Submet',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection
