@extends('layouts.app');

@section('content')
@if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">User_Id</th>
        <th scope="col">Phone</th>
       
      </tr>
    </thead>
    @foreach ($phones as $phone)
    
        <tr>
            <td>{{$phone->user_id}}</td>
            <td>{{$phone->phone}}</td>
            {{-- <td><a href="{{route('phones.edit',$phone->id)}}">Edit</a></td> --}}
            <td>
              @can('update', $phone)
                  
                {!! Form::open(['route' => ['phones.edit',$phone->id],'method'=>'GET']) !!}
                {{Form::submit('Edit',['class' => 'btn btn-success'])}}
    
                {!! Form::close() !!}
                @endcan

            </td>
            <td>
              @can('delete', $phone)
            {!! Form::open(['route' => ['phones.destroy',$phone->id],'method'=>'DELETE']) !!}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

            {!! Form::close() !!}
            @endcan
        </td>
        </tr>
    
        @endforeach

    
  </table>
    
@endsection
