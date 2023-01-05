@extends('layouts.app')

@section('content')
<div class="container">
        <center><h1>{{ $emailTemplate->name }}</h1></center>
    <p>{!! $emailTemplate->template !!}</p>
    <div style="float:left;">
        <a href="/email-templates/{{ $emailTemplate->id }}/edit" class="btn btn-primary mb-3">Edit Template</a>
    </div>
    <div style="position: absolute; margin-left: 600px;">
        <a href="/email-templates" class="btn btn-success mb-3" >BACK</a>
    </div>
    <div style="float: right" style="margin-top: 100px">
        <form action="/email-templates/{{ $emailTemplate->id }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" style="margin:5px">Delete Template</button>
    </form>
    </div>
</div>
@endsection
