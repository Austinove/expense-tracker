@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-7">
                    <div class="text-right upgrade-btn">
                        <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#expenses">New Expense</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h6 class="card-subtitle">Expenses</h6>
                                </div>
                                <div class="ml-auto">
                                    <div class="dl">
                                        <input type="month" name="month" id="month" />
                                    </div>
                                </div>
                            </div>
                            <!-- title -->
                        </div>
                        <div class="table-responsive">
                            <table class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0" style="width: 55%;">Description</th>
                                        <th class="border-top-0">Budget</th>
                                        <th class="border-top-0">User</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h4 class="m-b-0 font-14">Disclosure: This page contains external affiliate links that may result in us receiving a commission if.</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="font-14">2000000</span></td>
                                        <td><span class="font-14">John Deo</span></td>
                                        <td><span class="font-14">7/29/2020 </span></td>
                                        <td><span class="label label-rounded label-primary">Pending</span></td>
                                        <td>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a> | 
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a> | 
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a> |  
                                                <a href="javascript:void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a> | 
                                                <a href="javascript:void(0)"><i class="mdi mdi-block-helper"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h4 class="m-b-0 font-14">Disclosure: This page contains external affiliate links that may result in us receiving a commission if.</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="font-14">2000000</span></td>
                                        <td><span class="font-14">John Deo</span></td>
                                        <td><span class="font-14">7/29/2020 </span></td>
                                        <td><span class="label label-success label-rounded">Approved</span></td>
                                        <td>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a> | 
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a> | 
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a> |  
                                                <a href="javascript:void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a> | 
                                                <a href="javascript:void(0)"><i class="mdi mdi-block-helper"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <h4 class="m-b-0 font-14">Disclosure: This page contains external affiliate links that may result in us receiving a commission if.</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="font-14">2000000</span></td>
                                        <td><span class="font-14">John Deo</span></td>
                                        <td><span class="font-14">7/29/2020 </span></td>
                                        <td><span class="label label-danger label-rounded">Rejected</span></td>
                                        <td>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a> | 
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a> | 
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a> |  
                                                <a href="javascript:void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a> | 
                                                <a href="javascript:void(0)"><i class="mdi mdi-block-helper"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection