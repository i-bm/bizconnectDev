@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Theme Management') }}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm pull-right" data-bs-toggle="modal"
                        data-bs-target="#themeModal">
                        Add Theme
                    </button>
                </div>

                <div class="card-body">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Theme Name</th>
                                <th scope="col">Uploads</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody style="font-size:12px">
                            @foreach($themes as $theme)
                            <tr>
                                <td>{{$theme->title}}</td>
                                <td>
                                    @foreach($theme->themeupload as $image)

                                    <img src="{{ asset('storage/files/'.$image->name) }}" width="60" />
                                    @endforeach
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">

                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                            style="font-size:11px;">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#themeEditModal{{$theme->id}}">Edit</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#themeDeleteModal{{$theme->id}}">Delete</a></li>
                                        </ul>
                                    </div>


                                </td>

                            <tr>

                                @endforeach


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="themeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Theme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('theme.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Images</label>
                        <input type="file" class="form-control form-control-sm" name="files[]" required multiple
                            accept="image/*">
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

@foreach($themes as $theme)

<div class="modal fade" id="themeEditModal{{$theme->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Theme details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('theme.update', [$theme->id])}}" method="post">
                @csrf
                @METHOD('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" value="{{$theme->title}}" name="title"
                            required>
                    </div>

                    <div class="mb-3">
                        @foreach($theme->themeupload as $image)

                        <img src="{{ asset('storage/files/'.$image->name) }}" width="60" />
                        @endforeach

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


<div class="modal fade" id="themeDeleteModal{{$theme->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Theme Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('theme.delete', [$theme->id])}}" method="post">
                @csrf
                @METHOD('DELETE')
                <div class="modal-body">
                    <p class="lead">
                        Are you sure you want to delete Theme? <br>{{$theme->title}}
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