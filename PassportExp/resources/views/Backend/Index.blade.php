@extends('Layout')

@section('content') 

<br>
    backend index
 
    <br>
    <hr>

    @if (isset($data))
        @foreach ($data as $item)
            id:{{$item->id}} e-mail: {{$item->email}} <br>           
        @endforeach   
    @endif

  
@endsection

@section('css') 
@endsection
@section('js') 
@endsection