@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checklist Management') }}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-bs-toggle="modal"
                        data-bs-target="#checklistModal">
                        Add checklist
                    </button>
                </div>

                <div class="card-body">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">checklist Name</th>
                                <th scope="col">Date created</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody style="font-size:12px">

                            @forelse($checklists as $checklist)
                            <tr>
                                <td>{{$checklist->name}}</td>
                                <td>{{$checklist->created_at}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">

                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                            style="font-size:11px;">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#checklistEditModal{{$checklist->id}}">Edit</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#checklistDeleteModal{{$checklist->id}}">Delete</a></li>
                                        </ul>
                                    </div>

                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <p>No Data</p>
                                </td>
                            </tr>
                            @endforelse



                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="checklistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('checklist.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">checklist name(s) <small>(Seperate each item with a comma
                                ',')</small></label>
                        <textarea class="form-control form-control-sm" rows="3" name="title" required></textarea>
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


@foreach($checklists as $checklist)
<div class="modal fade" id="checklistEditModal{{$checklist->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('checklist.update',[$checklist->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">checklist name</label>
                        <input type="text" class="form-control form-control-sm" name="title"
                            value="{{$checklist->name}}" required>
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


<div class="modal fade" id="checklistDeleteModal{{$checklist->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('checklist.delete', [$checklist->id])}}" method="post">
                @csrf
                @METHOD('DELETE')
                <div class="modal-body">
                    <p class="lead">
                        Are you sure you want to delete checklist? <br>{{$checklist->name}}
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