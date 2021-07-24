@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subscribe to Your Package') }}
                    <!-- Button trigger modal -->
                </div>

                <div class="card-body">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Details</th>
                                <th scope="col">Price</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody style="font-size:12px">
                            @foreach($packages as $package)
                            <tr>
                                <td>{{$package->title}}</td>
                                <td>
                                    <ul>
                                        @foreach($package->details as $d)
                                        <li>{{$d}}</li>
                                        @endforeach
                                        <ul>
                                </td>
                                <td>{{$package->currency}} {{$package->price}}</td>
                                <td>{{$package->duration}} Month(s)</td>
                                <td>
                                    <a href="{{route('subscription.buy',[$package->id])}}"
                                        class="btn btn-sm btn-info">Subcribe</a>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection