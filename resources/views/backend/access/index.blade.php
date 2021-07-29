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
                            <h3 class="dt-entry__title">Access Level Management</h3>
                        </div>
                        <!-- /entry heading -->

                    </div>
                    <!-- /entry header -->

                    <div class="mb-3 text-right">
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                            data-target="#createNewRoleModal" aria-controls="createNewRoleModal">
                            Add new role </button>
    
                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal"
                            data-target="#createNewPermissionModal" aria-controls="createNewPermissionModal">
                            Add new permission</button>
                    </div>

            <button class="btn btn-info btn-sm" type="button" data-toggle="modal"
                data-target="#createNewPermissionModal" aria-controls="createNewPermissionModal">
                Add new permission</button>
        </div>

        <!-- Card -->
        <div class="dt-card overflow-hidden">

            <!-- Card Body -->
            <div class="dt-card__body p-0">

                <!-- Tables -->
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col">#</th>
                                <th class="text-uppercase" scope="col">Role</th>
                                <th class="text-uppercase" scope="col">Status</th>
                                <th class="text-uppercase" scope="col">Created At</th>
                                <th class="text-uppercase" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{$role->id}}</th>
                                <td>{{$role->name}}</td>
                                <td><span class="badge badge-pill badge-success mb-1 mr-1">Active</span></td>
                                <td>{{$role->created_at}}</td>
                                <td>
                                    <ul class="dt-list dt-list-cm-0">
                                        <!-- List Item -->
                                        <li class="dt-list__item">
                                            <a class="text-light-gray" href="javascript:void(0)">
                                                <i class="icon icon-editors "></i>
                                            </a>
                                        </li>
                                        <!-- /list item -->

                                        <!-- List Item -->
                                        <li class="dt-list__item">
                                            <a class="text-light-gray" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#permissionModal{{$role->id}}">
                                                <i class="icon icon-trash-filled"></i>
                                            </a>
                                        </li>
                                        <!-- /list item -->
                                    </ul>
                                    <!-- Dropdown -->
                                    <div class="btn-group dropdown mr-2 mb-2 d-none">

                                        <!-- Dropdown Button -->
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <!-- /dropdown button -->

                                        <!-- Dropdown Menu -->
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                            {{-- <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#permissionModal{{$role->id}}">Assign
                                            Permissions</a> --}}
                                        </div>
                                        <!-- /dropdown menu -->

                                    </div>
                                    <!-- /dropdown -->
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /tables -->

            </div>
            <!-- /card body -->

        </div>
        <!-- /card -->




        <!-- offcanvas -->


        <div class="modal fade" id="createNewRoleModal" tabindex="-1" role="dialog" aria-labelledby="model-3"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <!-- Modal Content -->
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title" id="model-7">Create New Role</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!-- /modal header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="post" action="{{route('role.add')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name" required
                                    placeholder="Enter role name" aria-label="Enter role name">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" id="button-addon2" type="submit">Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /modal body -->

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Save changes
                        </button>
                    </div>
                    <!-- /modal footer -->

                </div>
                <!-- /modal content -->

            </div>
        </div>


        <div class="modal fade" id="createNewPermissionModal" tabindex="-1" role="dialog" aria-labelledby="model-3"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <!-- Modal Content -->
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title" id="model-7">Create New Permission</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!-- /modal header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="post" action="{{route('permission.add')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name" required
                                    placeholder="Enter permission name">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit" id="button-addon4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /modal body -->

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Save changes
                        </button>
                    </div>
                    <!-- /modal footer -->

                </div>
                <!-- /modal content -->

            </div>
        </div>





        <!-- Modal -->
        @foreach($roles as $role)
        <div class="modal fade" id="permissionModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="model-3"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <!-- Modal Content -->
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Assign Permissions to role: {{$role->name}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!-- /modal header -->
                    <form action="{{route('permission.role', $role->id)}}" method="post">
                        @csrf
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                @foreach($permissions as $perm)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="checkbox" @foreach($roleperm as $r) @if($r->id
                                        == $role->id)
                                        @foreach($r->permissions as $p)
                                        @if($p->id == $perm->id) checked @endif
                                        @endforeach
                                        @endif
                                        @endforeach
                                        value="{{$perm->id}}" name="permissions[]">

                                        <label class="form-check-label" style="font-size:12px">
                                            {{$perm->name}}

                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="email@example.com">
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                        <!-- /modal body -->

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm" data-dismiss="modal">Save changes
                            </button>
                        </div>
                        <!-- /modal footer -->
                </div>
                <!-- /modal content -->
            </div>
        </div>
        @endforeach



    </div>
    <!-- /site content -->

    @endsection