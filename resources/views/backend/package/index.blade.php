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
                            <h3 class="dt-entry__title">Package Management</h3>
                        </div>
                        <!-- /entry heading -->

                    </div>
                    <!-- /entry header -->

                    <div class="mb-3 text-right">
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                            data-target="#addPackageModal" aria-controls="addPackageModal">
                            Add new package </button>
    
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
                               <th scope="col">Title</th>
                                <th scope="col">Details</th>
                                <th scope="col">Price</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                 <ul class="d-flex" style="list-style: none;padding-left:0">
                                            <!-- List Item -->
                                            <li class="dt-list__item">
                                              <a class="text-light-gray" href="javascript:void(0)"  data-toggle="modal" data-target="#editPackageModal{{$package->id}}">
                                                <i class="icon icon-editors "></i>
                                              </a>
                                            </li>
                                            <!-- /list item -->
                
                                            <!-- List Item -->
                                            <li class="dt-list__item">
                                              <a class="text-light-gray" href="javascript:void(0)"  data-toggle="modal" data-target="#deletePackageModal{{$package->id}}">
                                                <i class="icon icon-trash-filled"></i>
                                              </a>
                                            </li>
                                            <!-- /list item -->
                                          </ul>

                                   
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                        <!-- /card body -->

                    </div>
                    <!-- /card -->

</div>  
                


<!----Modals Start-->

<div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
              <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Create New Package</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            <form action="{{route('package.create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control form-control-sm" name="title" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Details <small>(Seperate each item with a comma ',')</small></label>
                        <textarea class="form-control form-control-sm" rows="3" name="details" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Choose Currency</label>
                        <select class="form-control form-select-sm" name="currency" required>
                            <option>GHS</option>
                            <option>USD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control form-control-sm" placeholder="0.00" name="price"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Duration <small>(months)</small></label>
                        <input type="number" class="form-control form-control-sm" name="duration" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Discount % <small>(optional)</small></label>
                        <input type="number" class="form-control form-control-sm" value="0" name="discount">
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

@foreach($packages as $package)

<div class="modal fade" id="editPackageModal{{$package->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
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

