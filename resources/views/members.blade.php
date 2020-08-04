@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row ml-1">
        @if ($users->count()>0)
            @foreach ($users as $user)
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                                <img src={{asset('profiles/'.$user->image)}} class="rounded-circle" width="150" />
                                <h4 class="card-title m-t-10">{{$user->name}}</h4>
                                <h6 class="card-subtitle">{{$user->userType}}</h6>
                                <span>Status:  
                                    <span class="{{$user->status==='Activated'? 'label label-success label-rounded':'label label-danger label-rounded'}}">{{$user->status}}</span>
                                </span>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> 
                            <small class="text-muted">Email address </small>
                            <h6>{{$user->email}}</h6> 
                            <small class="text-muted p-t-30 db">Name</small>
                            <h6>{{$user->name}}</h6>
                            <small class="text-muted p-t-30 db">Actions to User</small>
                            <br class="mt-1 mb-2"/>
                            @if (Auth()->user()->userType==="chairman")
                                @if ($user->status==='Deactivated')
                                    <div>
                                        <button class="btn btn-sm btn-outline-danger action" data-id={{$user->id}} btn-action="deactivate" disabled><i class="mdi mdi-close-circle"></i>Deactivate</button>
                                        <button class="btn btn-sm btn-outline-success action" data-id={{$user->id}} btn-action="activate"><i class="mdi mdi-check"></i>Activate</button>
                                    </div>
                                @else
                                    <div>
                                        <button class="btn btn-sm btn-outline-danger action" data-id={{$user->id}} btn-action="deactivate"><i class="mdi mdi-close-circle"></i>Deactivate</button>
                                        <button class="btn btn-sm btn-outline-success action" data-id={{$user->id}} btn-action="activate" disabled><i class="mdi mdi-check"></i>Activate</button>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection