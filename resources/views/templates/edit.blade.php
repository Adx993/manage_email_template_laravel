@extends('layouts.app')

@section('content')
<div class="container">
    <div>
                <h1>Edit Email Template</h1>
        <a href="/email-templates" class="btn btn-success" style="float:right; margin-top:-50px">BACK</a>
    </div>
    <form method="POST" action="/email-templates/{{ $emailTemplate->id }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name" class="mb-2">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $emailTemplate->name }}" required>
        </div>
        <div class="form-group">
            <label for="template" class="mb-2">Template</label>
            <textarea class="form-control" id="template" name="template" rows="10" required>{{ $emailTemplate->template }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Template</button>
    </form>
</div>
@endsection
