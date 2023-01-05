@extends('layouts.app')

@section('content')
<div class="container">
        <center><h1>Create Email Template</h1></center>
    <form method="POST" action="/email-templates">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="template">Template</label>
            <textarea class="form-control" id="template" name="template" rows="10" required>{!! old('template') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 5px;">Save Template</button>
    </form>
</div>
@endsection
