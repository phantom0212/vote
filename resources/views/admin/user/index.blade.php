@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="title">
            <h3>List user</h3>
            <button class="btn btn-info" id="btnAddUser" name="btnAdd">ADD NEW</button>
        </div>
        <table class="table table-responsive table-hover table-tripped">
            <thead>
            <tr>
                <th>Full name</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="listUser">
            @foreach($users as $user)
                <tr class="user_list{{$user->id}}">
                    <td>{{$user->name}}</td>
                    <td><img src="{{$user->avatar}}" alt=""></td>
                    <td>{{$user->email}}</td>
                    <td>
                        <button class="btn btn-warning fa fa-edit open_modal" value="{{$user->id}}">Edit</button>
                        <button class="btn btn-danger fa fa-remove delete-user" value="{{$user->id}}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {{ $users->links() }}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error"  id="userName" name="name"
                                           placeholder="Insert your full name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDetail" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="emailUser" name="email"
                                           placeholder="Insert your email" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDetail" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="userPassword" name="password"
                                           placeholder="Your password" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDetail" class="col-sm-3 control-label">Retype Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Retype password" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <input type="hidden" id="user_id" name="user_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
