@extends('layouts.app')

@section('content')
<div class="container">
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight1" aria-labelledby="offcanvasRightLabel">
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


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
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

@endsection