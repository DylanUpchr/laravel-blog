@extends('base')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <h1 class="display-3">Home</h1>   
    <div>
      </div>   
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
