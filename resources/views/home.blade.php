@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                  <div class="card-header"> Welcome, {{ $name }}! </div>
                        <div class="card-body">  
                            <div class="card text-center">
                                <h5 class="card-title mb-5 py-5">What would you like to do?</h5>
                                    <div class="btn-group" role="group">
                                        <a href="/email-templates" class="btn btn-sm btn-warning mb-5">Manage Templates</a>
                                            <a href="/email" class="btn btn-sm btn-danger mb-5">E-Mail Templates</a>
                                    </div>
                            </div>
                        </div>
                     </div>
                </div>
           </div>
        </div>
    </div>
</div>
@endsection
