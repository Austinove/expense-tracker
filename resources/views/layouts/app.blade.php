<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.jpg')}}">
    <title>Friends With a Purpose</title>
    <!-- Custom CSS -->
    <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-decoration-none">
    <div id="app">
        <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar fixed-top navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img height="60px" src="{{asset('images/logo.JPG')}}" alt="homepage" />
                        </b>
                        <span class="font-14">Friends With a Purpose</span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white waves-effect waves-dark pro-pic" href=""aria-expanded="false">About Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main class="py-4">
            @include('layouts.modal')
            @include('layouts.side')
            @yield('content')
            @include('layouts.footer')
        </main>
    </div>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(() => {
            //Empty inputs
            const emptyInputs = () => {
                $("#desc").val("");
                $("#budget").val("");
            }

            //Get function request
            const getRequest = url => {
                return $.ajax({
                    url:url,
                    type: "get",
                    dataType: "json"
                });
            };

            //post function request
            const postActions = (actionUrl, sendData) => {
                return $.ajax({
                    url: actionUrl,
                    type: "post",
                    data: JSON.stringify(sendData),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: "application/json",
                    cache: false,
                    processData: false,
                });
            }

            //closing modal
            $(document).on("click", ".modal-close", e => {
                emptyInputs();
                $("#request-btn").attr("btn-action", "save").html('<i class="mdi mdi-check"></i> Request');
            })

            //setting up month inputs
            const setMonth = () => {
                var d = new Date();
                var currentMonth;
                (d.getMonth() + 1) >= 10 ? 
                currentMonth = (d.getMonth() + 1) :
                currentMonth = "0" + (d.getMonth() + 1);
                $("#month").val(d.getFullYear() + "-" + currentMonth);
            }
            setMonth();

            //User activation and Deactivation actions
            $(document).on("click", ".action", function() {
                var initialUrl = "status/actions"
                var action;
                $(this).attr('btn-action') === "activate" ? (action = { "id": $(this).attr('data-id'), "action": "Activated" }) : (action ={ "id": $(this).attr('data-id'), "action": "Deactivated" });
                $.when(postActions(initialUrl, action).done(response => {
                    location.reload();
                }).fail(error => {
                    console.log(error)
                }))
            })
            
            $('#pdf-year').datepicker({
                minViewMode: 'years',
                autoclose: true,
                    format: 'yyyy'
            });
            
        // $('.top-right').notify({
        //     message: { text: "Hello its working" }
        // }).show();

        $('#profile-form').submit(function(e) {
            e.preventDefault();
            var actionUrl = "edit/profile";
            $('#profile-btn').html('Submiting...');
            $("#profile-btn").prop('disabled', true);
            $.ajax({
                url: actionUrl,
                type: "post",
                data: new FormData(this),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                cache: false,
                processData: false,
            })
            .done(response => {
                console.log(response);
                $('#profile-btn').html('Update Profile');
                $("#profile-btn").prop('disabled', false);
                location.reload();
            })
            .fail(error => {
                console.log(error);
            });
        });

        $('#expense-form').submit(function(e) {
            e.preventDefault();
            var actionUrl = "expense";
            if($("#request-btn").attr("btn-action") !== "save"){
                actionUrl="expenses/edit";
            }
            $('#request-btn').html('Submiting...');
            $("#request-btn").prop('disabled', true);
            $.ajax({
                url: actionUrl,
                type: "post",
                data: new FormData(this),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                cache: false,
                processData: false,
            })
            .done(response => {
                fetchExpenses();
                $(expenses).modal("hide");
                $('#request-btn').html('<i class="mdi mdi-check"></i> Request');
                $("#request-btn").prop('disabled', false);
            })
            .fail(error => {
                console.log(error);
            });
        });
        
        const fetchExpenses = () => {
            var month = $("#month").val().split("-")[1];
            var monthData = {"month": ("-" + month + "-")}
            $.when(postActions("expenses/fetch", monthData).done(response => {
                renderExpenses(response);
            }).fail(error => {
                console.log(error);
            }))
        }
        fetchExpenses();
        
        const renderExpenses = expensesData => {
            $(".expenses-tbody").html("");
            expensesData.forEach(expense => {
                var spanClass;
                switch (expense.status) 
                {
                    case 'pending':
                        spanClass = "label label-rounded label-primary"
                        break;
                    case 'approved':
                        spanClass = "label label-rounded label-success"
                        break;
                    case 'rejected':
                        spanClass = "label label-rounded label-danger" 
                        break; 
                    case 'recommended':
                        spanClass = "label label-rounded label-warning" 
                        break;                                   
                    default:
                        break;
                }
                return $(".expenses-tbody").append(`
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <h4 class="m-b-0 font-14">${expense.desc}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="font-14">${expense.budget}</span></td>
                                <td><span class="font-14">${expense.name}</span></td>
                                <td><span class="font-14">${expense.created_at}</span></td>
                                <td><span class="${spanClass}">${expense.status}</span></td>
                                <td>
                                    <span class="action-icons">
                                        ${(expense.status === 'pending') ? '<a href="#" class="edit-icon" disabled id-data="'+expense.id+'" budget-data="'+expense.budget+'" desc-data="'+expense.desc+'"><i class="ti-pencil-alt"></i></a> | ': 'No Actions'}
                                        ${(expense.userType === 'treasurer')&&(expense.status === 'recommended') ? '<a href="#" class="approve-icon" id-data="'+expense.id+'"><i class="ti-check color-success"></i></a> | ': ' '}
                                        ${(expense.userType === 'chairman')&&(expense.status === 'pending') ? '<a href="#" class="recommend-icon" id-data="'+expense.id+'"><i class="ti-heart"></i></a> |  ': ' '}
                                        ${(expense.status === 'pending') ? '<a href="#" class="delete-icon" id-data="'+expense.id+'"><i class="fa fa-trash color-danger" aria-hidden="true"></i></a> | ': ' '}
                                        ${(expense.userType === 'chairman')&&(expense.status === 'pending') ? '<a href="#" class="decline-icon" id-data="'+expense.id+'"><i class="mdi mdi-block-helper"></i></a>': ' '}
                                    </span>
                                </td>
                            </tr>
                        `)
            });
        }
        $(document).on("click", ".edit-icon", function(e) {
            e.preventDefault();
            $("#budget").val($(this).attr("budget-data"));
            $("#desc").val($(this).attr("desc-data"));
            $("#request-btn").attr("btn-action", "edit").html('<i class="fa fa-save"></i> Save Changes');
            $("#expenses").modal("show");
        });

        $(document).on("click", ".delete-icon", function(e) {
            e.preventDefault();
            $("#budget").val($(this).attr("id-data"));
            $("#desc").val($(this).attr("desc-data"));
            $("#request-btn").attr("btn-action", "edit").html('<i class="fa fa-save"></i> Save Changes');
            $("#expenses").modal("show");
        });
    });
    </script>
    <!--Wave Effects -->
    <script src="{{asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    {{-- <script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script> --}}
    {{-- <script src="{{asset('dist/js/pages/dashboards/dashboard1.js')}}"></script> --}}
</body>
</html>
