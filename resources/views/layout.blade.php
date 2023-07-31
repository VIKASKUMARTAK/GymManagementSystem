<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin : Gym</title>

    @if(!Session::has('adminData'))
        <script type="text/javascript">
            window.location.href="{{url('admin/adminlogin')}}";
        </script>
    @endif

    <!-- Custom fonts for this template-->
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin')}}">
                
                <div class="sidebar-brand-text mx-3">Gym Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Masters
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/packagetype*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>PackageType</span>
                </a>
                <div id="collapseTwo" class="collapse @if(request()->is('admin/packagetype*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/packagetype/create')}}">Add New</a>
                        <a class="collapse-item" href="{{url('admin/packagetype')}}">View All</a>
                    </div>
                </div>
            </li>

            <!--PackageMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/packages*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#PackageMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Package</span>
                </a>
                <div id="PackageMaster" class="collapse @if(request()->is('admin/packages*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/packages/create')}}">Add New</a>
                        <a class="collapse-item" href="{{url('admin/packages')}}">View All</a>
                    </div>
                </div>
            </li>

            <!--CustomerMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/customer*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#CustomerMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customer</span>
                </a>
                <div id="CustomerMaster" class="collapse @if(request()->is('admin/customer*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{url('admin/customer')}}">View All</a>
                    </div>
                </div>
            </li>

            <!-- Department -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/department*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#DepartmentMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Departments</span>
                </a>
                <div id="DepartmentMaster" class="collapse @if(request()->is('admin/department*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/department/create')}}">Add New</a>
                        <a class="collapse-item" href="{{url('admin/department')}}">View All</a>
                    </div>
                </div>
            </li>

            <!-- Staff -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/staff*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#StaffMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Staff</span>
                </a>
                <div id="StaffMaster" class="collapse @if(request()->is('admin/staff*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/staff/create')}}">Add New</a>
                        <a class="collapse-item" href="{{url('admin/staff')}}">View All</a>
                    </div>
                </div>
            </li>
            
            <!--Booking-->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/bookings')}}">
                    <i class="fas fa-table"></i>
                    <span>Bookings</span></a>
            </li>

            <!-- Logout Modal -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/logout')}}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>

    @yield('scripts')

</body>

</html>