@extends('layouts.app')

@section('content')
<div class="container">
        <center><h1>Select Templates & E-Mail</h1></center>
    <a href="/email-templates" class="btn btn-warning mb-3">View Templates</a>
    <form method="POST" action="/send-email">
        @csrf
        <div class="form-group">
            <label for="template_id" class="mb-2">Template</label>
            <select class="form-control" id="template" name="template" required>
                @foreach ($template as $temp)
                    <option value="{{ $temp->name }}">{{ $temp->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email" class="mb-2">Email</label>
            <select class="form-control" id="email" name="email" required>
                @foreach ($email as $emails)
                    <option value="{{ $emails->email }}">{{ $emails->email }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="margin:10px">Send Email</button>
    </form>
</div>
@endsection

