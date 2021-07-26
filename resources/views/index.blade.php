<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boostrap 5</title>
    <link rel="stylesheet" href={{ asset('css/admin.css') }}>
</head>
<body>
<div class="container">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Starter Pages
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Active Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inactive Page</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Simple Link
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <div class="alert alert-success mt-5" role="alert">
        Boostrap 5 is working using laravel 8 mix!
    </div>


    <!-- Main node for this component -->
    <div class="timeline timeline-inverse">
        <!-- Timeline time label -->
        <div class="time-label">
            <span class="bg-green">23 Aug. 2019</span>
        </div>
        <div>
            <!-- Before each timeline item corresponds to one icon on the left scale -->
            <i class="fas fa-envelope bg-blue"></i>
            <!-- Timeline item -->
            <div class="timeline-item">
                <!-- Time -->
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <!-- Header. Optional -->
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                <!-- Body -->
                <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                </div>
                <!-- Placement of additional controls. Optional -->
                <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>

            <div class="timeline-item">
                <!-- Time -->
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <!-- Header. Optional -->
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                <!-- Body -->
                <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                </div>
                <!-- Placement of additional controls. Optional -->
                <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
        <!-- The last icon means the story is complete -->
        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
    </div>

</div>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
