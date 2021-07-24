@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You have selected: ') }}{{$package->title}}
                    <!-- Button trigger modal -->
                </div>

                <div class="card-body">
                    <livewire:subsform />

                </div>
            </div>
        </div>
    </div>
</div>

@endsection