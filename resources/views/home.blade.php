@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(auth()->user()->roles()->first()->name == 'admin')
                    <button class="btn btn-success">users</button>
                    @endif

                    @if(auth()->user()->roles()->first()->name == 'directeur')
                    <button class="btn btn-success">directeur</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
