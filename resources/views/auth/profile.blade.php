@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row ml-1">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> 
                        <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                        <h4 class="card-title m-t-10">Hanna Gover</h4>
                        <h6 class="card-subtitle">Accounts Manager</h6>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> 
                    <small class="text-muted">Email address </small>
                    <h6>hannagover@gmail.com</h6> 
                    <small class="text-muted p-t-30 db">Name</small>
                    <h6>Bryan Jobs</h6>
                    {{-- <small class="text-muted p-t-30 db">Actions to User</small>
                    <br/> --}}
                    {{-- <button class="btn btn-circle btn-secondary"><i class="mdi mdi-check">Activate</i> </button>
                    <button class="btn btn-circle btn-secondary"><i class="mdi mdi-close-circle"> Deactivate</i></button> --}}
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Profile Image</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Column -->
</div>
@endsection