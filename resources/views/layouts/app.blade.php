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
                            <img height="60px" src="{{asset('images/logo.jpg')}}" alt="logo" />
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
            //setting up month inputs
            const setMonth = () => {
                var d = new Date();
                var currentMonth;
                (d.getMonth() + 1) >= 10 ? 
                currentMonth = (d.getMonth() + 1) :
                currentMonth = "0" + (d.getMonth() + 1);
                $("#month").val(d.getFullYear() + "-" + currentMonth);
                console.log("month set");
            }
            setMonth();

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
            
            // //check for connectivity
            // setInterval(() => {
            //     $.when(getRequest("check").then(response => {}).fail(error => {
            //         $(".connection-check").html("Your may be disconnected from internet");
            //     }))
            // }, 6000);

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
                actionUrl=`expenses/edit/${$("#request-btn").attr("btn-id")}`;
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
                emptyInputs();
                $('#request-btn').html('<i class="mdi mdi-check"></i> Request').attr("btn-action", "save");
                $("#request-btn").prop('disabled', false);
            })
            .fail(error => {
                console.log(error);
            });
        });
        
        const fetchExpenses = () => {
            var monthData = {"date": ($("#month").val())}
            $.when(postActions("expenses/fetch", monthData).done(response => {
                renderExpenses(response);
            }).fail(error => {
                console.log(error);
            }))
        }
        fetchExpenses();
        $(".fetchExp").change(function() {
            $.when(postActions("expenses/fetch", {"date": ($(this).val())}).done(response => {
                renderExpenses(response);
            }).fail(error => {
                console.log(error);
            }))
        });
        
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
                    case 'declined':
                        spanClass = "label label-rounded label-danger" 
                        break; 
                    case 'recommend':
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
                                        ${(expense.status === 'pending') ? '<a href="#" class="edit-icon" disabled id-data="'+expense.id+'" budget-data="'+expense.budget+'" desc-data="'+expense.desc+'"><i class="ti-pencil-alt"></i></a> | ': '__'}
                                        ${(expense.status === 'pending') ? '<a href="#" class="delete-icon" id-data="'+expense.id+'"><i class="fa fa-trash color-danger" aria-hidden="true"></i></a> | ': ' '}
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
            $("#request-btn").attr("btn-action", "edit").html('<i class="fa fa-save"></i> Save Changes').attr("btn-id", $(this).attr('id-data'));
            $("#expenses").modal("show");
        });

        $(document).on("click", ".delete-icon", function(e) {
            e.preventDefault();
            var deleteExp = {"id": $(this).attr("id-data")}
            $.when(postActions("expenses/delete", deleteExp).done(response => {
                fetchExpenses();
            }).fail(error => {
                console.log(error);
            }));
        });

        $(document).on("click", ".recommend-icon", function(e) {
            e.preventDefault();
            var recomExp = {
                "id": $(this).attr("id-data"),
                "action": "recommend"
                }
            $.when(postActions("actions", recomExp).done(response => {
                fetchPendingExp();
            }).fail(error => {
                console.log(error);
            }))
        });
        $(document).on("click", ".decline-icon", function(e) {
            e.preventDefault();
            var declineExp = {
                "id": $(this).attr("id-data"),
                "action": "declined"
                }
            $.when(postActions("actions", declineExp).done(response => {
                fetchPendingExp();
            }).fail(error => {
                console.log(error);
            }))
        });
        $(document).on("click", ".approve-icon", function(e) {
            e.preventDefault();
            var acceptExp = {
                "id": $(this).attr("id-data"),
                "action": "approved"
                }
            $.when(postActions("actions", acceptExp).done(response => {
                fetchRecoExp();
            }).fail(error => {
                console.log(error);
            }))
        });
        
        const fetchPendingExp = () => {
            var monthData = {"date": ($("#month").val())}
            $.when(postActions("fetch/pending", monthData).done(response => {
                renderPendingExp(response);
            }).fail(error => {
                console.log(error);
            }))
        }
        fetchPendingExp();
        const renderPendingExp = expensesData => {
            $(".pending-tbody").html("");
            expensesData.forEach(expense => {
                return $(".pending-tbody").append(`
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
                                <td><span class="label label-rounded label-primary">${expense.status}</span></td>
                                <td>
                                    <span class="action-icons">
                                        <a href="#" class="recommend-icon" id-data="${expense.id}"><i class="ti-heart"></i></a> |  
                                        <a href="#" class="decline-icon" id-data="${expense.id}"><i class="mdi mdi-block-helper"></i></a>
                                    </span>
                                </td>
                            </tr>
                        `)
            });
        }
        $(".pendingExp").change(function() {
            $.when(postActions("fetch/pending", {"date": ($(this).val())}).done(response => {
                renderPendingExp(response);
            }).fail(error => {
                console.log(error);
            }))
        });

        const fetchRecoExp = () => {
            var monthData = {"date": ($("#month").val())}
            $.when(postActions("fetchReco", monthData).done(response => {
                renderRecoExp(response);
            }).fail(error => {
                console.log(error);
            }))
        }
        fetchRecoExp();
        const renderRecoExp = expensesData => {
            $(".recommend-tbody").html("");
            expensesData.forEach(expense => {
                return $(".recommend-tbody").append(`
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
                                <td><span class="label label-rounded label-warning">${expense.status}</span></td>
                                <td>
                                    <span class="action-icons">
                                        <a href="#" class="approve-icon" id-data="${expense.id}"><i class="ti-check color-success"></i></a>
                                    </span>
                                </td>
                            </tr>
                        `)
            });
        }
        $(".recoExp").change(function() {
            $.when(postActions("fetchReco", {"date": ($(this).val())}).done(response => {
                renderRecoExp(response);
            }).fail(error => {
                console.log(error);
            }))
        });

        const fetchAllExpenses = () => {
            var monthData = {"date": ($("#month").val())}
            $.when(postActions("fetch/expenses", monthData).done(response => {
                renderAllExpenses(response.expenses);
                $(".year-total").html(`${response.totalYear} UGX`);
                $(".month-total").html(`${response.totalMonth} UGX`);
            }).fail(error => {
                console.log(error);
            }))
        }
        fetchAllExpenses();
        const renderAllExpenses = expensesData => {
            $(".all-tbody").html("");
            expensesData.forEach(expense => {
                return $(".all-tbody").append(`
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
                                <td><span class="label label-rounded label-success">${expense.status}</span></td>
                            </tr>
                        `)
            });
        }
        $(".allExp").change(function() {
            $.when(postActions("fetch/expenses", {"date": ($(this).val())}).done(response => {
                renderAllExpenses(response.expenses);
                $(".year-total").html(`${response.totalYear}`);
                $(".month-total").html(`${response.totalMonth}`);
            }).fail(error => {
                console.log(error);
            }))
        })
        // setTimeout(() => {
        //     fetchPendingExp();
        //     fetchExpenses();
        //     fetchRecoExp();
        //     fetchAllExpenses();
        // }, 6000);
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
