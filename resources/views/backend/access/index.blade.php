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

                     <!-- Card -->
                     <div class="dt-card overflow-hidden">

                        <!-- Card Body -->
                        <div class="dt-card__body p-0">

                            <!-- Tables -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
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
                                        <td><span class="badge badge-success badge-circle-animate1 align-text-top">Active</span></td>
                                        <td>{{$role->created_at}}</td>
                                        <td class="d-none"> 
                                            <!-- List -->
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
                                                <a class="text-light-gray" href="javascript:void(0)">
                                                  <i class="icon icon-trash-filled"></i>
                                                </a>
                                              </li>
                                              <!-- /list item -->
                  
                                              <!-- List Item -->
                                              <li class="dt-list__item">
                                                <div class="dropdown">
                                                  <a class="dropdown-toggle no-arrow text-light-gray" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon icon-horizontal-more icon-fw"></i>
                                                  </a>
                                                  <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 18px, 0px);">
                                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">Another
                                                      action</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">Something
                                                      else here</a>
                                                  </div>
                                                </div>
                                              </li>
                                              <!-- /list item -->
                                            </ul>
                                            <!-- /list -->
                                          </td>
                                          <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                                            href="#exampleModal{{$role->id}}">Assign Permissions</a></li>
        
        
                                                </ul>
                                            </div>
        
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

<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight">
                        Add new role </button>

                    <button class="btn btn-info btn-sm" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight">
                        Add new permission</button>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody style="font-size: 14px">

                            @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{$role->id}}</th>
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at}}</td>
                               
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    href="#exampleModal{{$role->id}}">Assign Permissions</a></li>


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



<!-- offcanvas -->

<div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Create New Role</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form method="post" action="{{route('role.add')}}">
            @csrf
            <div class="input-group input-group-sm mb-1">
                <input type="text" class="form-control" name="name" required placeholder="Enter role name">
                <button class="btn btn-outline-info" type="submit" id="button-addon2">Save</button>

            </div>

        </form>
    </div>
</div>


<div class="offcanvas offcanvas-end d-none" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Create New Permission</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form method="post" action="{{route('permission.add')}}">
            @csrf
            <div class="input-group input-group-sm mb-1">
                <input type="text" class="form-control" name="name" required placeholder="Enter permission name">
                <button class="btn btn-outline-info" type="submit" id="button-addon2">Save</button>

            </div>

        </form>
    </div>
</div>








<!-- Modal -->
@foreach($roles as $role)
<div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Permissions to role: {{$role->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('permission.role', $role->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- @foreach($roleperm as $r)
                    @if($r->id == $role->id)
                    @foreach($r->permissions as $p)
                    {{$p->id}}
                    @endforeach

                    @endif

                    @endforeach -->
                    <div class="row">
                        @foreach($permissions as $perm)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" @foreach($roleperm as $r)@if($r->id ==
                                $role->id) @foreach($r->permissions as $p) @if($p->id == $perm->id) checked @endif
                                @endforeach @endif @endforeach
                                value="{{$perm->id}}" name="permissions[]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault" style="font-size:12px">
                                    {{$perm->name}}

                                </label>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

</div>
<!-- /site content -->

@endsection