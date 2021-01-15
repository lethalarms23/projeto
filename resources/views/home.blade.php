@extends('layout')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <h3><div class="card-header bg-dark d-flex justify-content-center">{{ __('Bem Vindo')}} {{Auth::user()->name}}</div></h3>

                <div class="card-body bg-dark">
                    @if (session('status'))
                        <div class="alert alert-success bg-dark" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->check())
                        ID: {{Auth::user()->id}}<br>
                        Email: {{Auth::user()->email}}<br>
                        Nome: {{Auth::user()->name}}<br>
                    @endif
                </div>
                <a class="bg-dark btn btn-outline-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
