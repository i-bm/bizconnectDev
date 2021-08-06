@extends('layouts.dashboard.main')

@section('content')
  <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Dashboard</h1>
                    </div>
                    <!-- /page header -->

                      <!-- Entry Header -->
                    <div class="dt-entry__header">

                        <!-- Entry Heading -->
                        <div class="dt-entry__heading">
                            <h3 class="dt-entry__title">Theme Management</h3>
                        </div>
                        <!-- /entry heading -->

                    </div>
                    <!-- /entry header -->

                    <div class="mb-3 text-right">
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                            data-target="#addThemeModal" aria-controls="addThemeModal">
                            Add new theme </button>
    
                        {{-- <button class="btn btn-info btn-sm" type="button" data-toggle="modal"
                            data-target="#createNewPermissionModal" aria-controls="createNewPermissionModal">
                            Add new permission</button> --}}
                    </div>

                     <!-- Card -->
                     <div class="dt-card overflow-hidden">

                        <!-- Card Body -->
                        <div class="dt-card__body p-0">

                         <!-- Tables -->
                            <div class="table-responsive">

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
                        <!-- /card body -->

                    </div>
                    <!-- /card -->

</div>  
                


<!----Modals Start-->

<div class="modal fade" id="addThemeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
              <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Create New Theme</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            <form action="{{route('theme.create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                         <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="title" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Upload Images</label>
                        <input type="file" class="form-control form-control-sm" name="files[]" required multiple
                            accept="image/*">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($themes as $theme)

<div class="modal fade" id="editPackageModal{{$theme->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Edit Package Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            <form action="{{route('package.update', [$package->id])}}" method="post">
                @csrf
                @METHOD('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="title" value="{{$package->title}}"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Details <small>(Seperate each item with a comma ',')</small></label>
                        <textarea class="form-control form-control-sm" rows="3" name="details" required>{{ implode(",", $package->details) }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Choose Currency</label>
                        <select class="form-control form-select-sm" name="currency" required>
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

                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control form-control-sm" value="{{$package->price}}"
                            placeholder="0.00" name="price" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Duration <small>(months)</small></label>
                        <input type="number" class="form-control form-control-sm" value="{{$package->duration}}"
                            name="duration" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Discount % <small>(optional)</small></label>
                        <input type="number" class="form-control form-control-sm" value="{{$package->discount}}"
                            name="discount">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Updates</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="deletePackageModal{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Package Delete Confirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            
            <form action="{{route('package.delete', [$package->id])}}" method="post">
                @csrf
                @METHOD('DELETE')
                <div class="modal-body">
                    <p class="lead">
                        Are you sure you want to delete Package? <br>{{$package->title}}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

<!--End Modals-->

</div>
<!-- /site content -->

@endsection

