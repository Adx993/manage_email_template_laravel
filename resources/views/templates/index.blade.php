@extends('layouts.app')

@section('content')

   <div class="container">
       <center> <h1>View Templates</h1></center>
    <div class="col-md-2">
        <a href="/email-templates/create" class="btn btn-primary mb-3" style="margin-left: 20px;">Create Template</a>
    </div>
    <div class="col-md-2" style="float: right; margin-top: -53px;
    margin-right: 20px;">
        <a href="/email" class="btn btn-warning mb-3">Send Email</a>
    </div>
    <table class="table table-striped " style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Template</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($templates as $template)
                <tr>
                    <td style="padding-top: 200px">{{ $template->name }}</td>
                    <td>{!! $template->template !!}</td>
                    <td style="padding-top: 200px">
                        <a href="/email-templates/{{ $template->id }}" class="btn btn-secondary">View</a>
                        <a href="/email-templates/{{ $template->id }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/email-templates/{{ $template->id }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <!-- pagination -->
    @if ($templates->lastPage() > 1)
    <nav aria-label="Posts pagination">
        <ul class="pagination justify-content-center">
            @if ($templates ->currentPage() > 1)
                <li class="page-item"><a class="page-link" href="{{ $templates->previousPageUrl() }}">Prev</a></li>
            @endif
            @for ($i = 1; $i <= $templates ->lastPage(); $i++)
                <li class="page-item {{ ($templates ->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $templates ->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            @if ($templates ->currentPage() < $templates ->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $templates->nextPageUrl() }}">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
   </div>
@endsection
