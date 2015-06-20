@extends('layouts.single')

@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}
    
	{!! Form::close() !!}
@stop



