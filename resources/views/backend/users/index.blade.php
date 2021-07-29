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
                            <h3 class="dt-entry__title">User Management</h3>
                        </div>
                        <!-- /entry heading -->

                    </div>
                    <!-- /entry header -->

                    <div class="mb-3 text-right">
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                            data-target="#addUserModal" aria-controls="addUserModal">
                            Add new user </button>
    
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

                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">status</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->accesslevel}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                <ul class="d-flex" style="list-style: none;padding-left:0">
                                            <!-- List Item -->
                                            <li class="dt-list__item">
                                              <a class="text-light-gray" href="javascript:void(0)"  data-toggle="modal" data-target="#editUserModal{{$user->id}}">
                                                <i class="icon icon-editors "></i>
                                              </a>
                                            </li>
                                            <!-- /list item -->
                
                                            <!-- List Item -->
                                            <li class="dt-list__item">
                                              <a class="text-light-gray" href="javascript:void(0)"  data-toggle="modal" data-target="#deleteUserModal{{$user->id}}">
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
                


<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="model-7">Create New User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            <form action="{{route('user.create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label class="">Full Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="">Email address</label>
                        <input type="email" class="form-control form-control-sm" name="email" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="">Phone</label>
                        <input type="text" class="form-control form-control-sm" name="phone" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="">Assign Role</label>
                        <select class="form-control" name="access" required>
                            <option value="">Choose Role</option>
                            @foreach($roles as $role)
                            <option>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confrim Password</label>
                        <input type="password" class="form-control form-control-sm" name="password_confirmation">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($users as $user)
<div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="model-7">Edit User Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            <form action="{{route('user.update', [$user->id])}}" method="post">
                @csrf
                @METHOD('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control form-control-sm" value="{{$user->name}}" name="name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control form-control-sm" name="phone" value="{{$user->phone}}"
                            required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label">Assign Role</label>
                        <select class="form-control form-select-sm" name="access" required>
                            <option>{{$user->accesslevel}} </option>
                            @foreach($roles as $role)
                            @if($role->name != $user->accesslevel)
                            <option>{{$role->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteUserModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content1">
                <!-- Modal Content -->
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" >User Delete Comfirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- /modal header -->
            <form action="{{route('user.delete', [$user->id])}}" method="post">
                @csrf
                @METHOD('DELETE')
                <div class="modal-body">
                    <p class="lead">
                        Are you sure you want to delete user? <br>{{$user->name}}
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

</div>
<!-- /site content -->

@endsection