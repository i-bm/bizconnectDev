@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Package Management') }}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-bs-toggle="modal"
                        data-bs-target="#packageModal">
                        Add Package
                    </button>
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
                                    <div class="dropdown">
                                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">

                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                            style="font-size:11px;">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#packageEditModal{{$package->id}}">Edit</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#packageDeleteModal{{$package->id}}">Delete</a></li>
                                        </ul>
                                    </div>
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



<!-- Modal -->
<div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('package.create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Details <small>(Seperate each item with a comma ',')</small></label>
                        <textarea class="form-control form-control-sm" rows="3" name="details" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Choose Currency</label>
                        <select class="form-select form-select-sm" name="currency" required>
                            <option>GHS</option>
                            <option>USD</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control form-control-sm" placeholder="0.00" name="price"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration <small>(months)</small></label>
                        <input type="number" class="form-control form-control-sm" name="duration" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Discount % <small>(optional)</small></label>
                        <input type="number" class="form-control form-control-sm" value="0" name="discount">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($packages as $package)

<div class="modal fade" id="packageEditModal{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Package Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('package.update', [$package->id])}}" method="post">
                @csrf
                @METHOD('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="title" value="{{$package->title}}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Details <small>(Seperate each item with a comma ',')</small></label>
                        <textarea class="form-control form-control-sm" rows="3" name="details" required>{{ implode(",", $package->details) }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Choose Currency</label>
                        <select class="form-select form-select-sm" name="currency" required>
                            @if($package->currency == "GHS")
                            <option>{{$package->currency}}</option>
                            <option>USD</option>
                            @endif
                            @if($package->currency == "USD")
                            <option>{{$package->currency}}</option>
                            <option>GHS</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control form-control-sm" value="{{$package->price}}"
                            placeholder="0.00" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration <small>(months)</small></label>
                        <input type="number" class="form-control form-control-sm" value="{{$package->duration}}"
                            name="duration" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Discount % <small>(optional)</small></label>
                        <input type="number" class="form-control form-control-sm" value="{{$package->discount}}"
                            name="discount">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Updates</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="packageDeleteModal{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Package Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('package.delete', [$package->id])}}" method="post">
                @csrf
                @METHOD('DELETE')
                <div class="modal-body">
                    <p class="lead">
                        Are you sure you want to delete Package? <br>{{$package->title}}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection