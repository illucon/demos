<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('public/admin_assets')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <li class="header">HEADER</li>
            
            <li class=""><a href="{{url('/')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Student</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{url('/new-admission')}}">New Admission</a></li>
                    <li class=""><a href="{{url('/student-list')}}">Student List</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Academic Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{url('/classes')}}">CLass Management</a></li>
                    <li><a href="{{url('/sections')}}">Section</a></li>
                    <li><a href="{{url('/subjects')}}">Subject</a></li>
                    <li><a href="{{url('/years')}}">Academic Years</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Exam & Results</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{url('/grade-setting')}}">Grade Setting</a></li>
                    <li class=""><a href="{{url('/exam-type')}}">Exam Type</a></li>
                    <li class=""><a href="{{url('/exams')}}">Set New Exam</a></li>
                    <li class=""><a href="{{url('/mark-entries')}}">Mark Entry</a></li>
                    <li class="">
                        <a href="#">Show Results</a>
                            <ul class="treeview-menu">
                                 <li class=""><a href="{{url('/result-by-student-all-exam')}}">By Student(All Exam)</a></li>
                                 <li class=""><a href="{{url('/section-exam-result')}}">Section Exam Result</a></li>
                            </ul>
                    </li>
                </ul>
            </li>
            
            <li class="treeview active">
                <a href="#"><i class="fa fa-bank"></i> Account Management
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="#"><i class="fa  fa-graduation-cap"></i> Student Account
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            
                            <li><a href="{{url('assign-invoice')}}"><i class="fa fa-circle"></i> <span>Assign Invoice</span></a></li>
                            <li><a href="{{url('all-invoices')}}"><i class="fa fa-circle"></i> <span>All Invoices</span></a></li>
                            <li><a href="{{url('all-received-payments')}}"><i class="fa fa-circle"></i> <span>All Receive Payments</span></a></li>
                            
                        </ul>
                    </li>
                    
                    <li class="treeview active">
                        <a href="#"><i class="fa  fa-cog"></i> Account Settings
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('account-item-price')}}"><i class="fa fa-circle"></i> <span>Account Items Price</span></a></li>
                            <li><a href="{{ url('account-items') }}"><i class="fa fa-circle"></i> <span>Account Items</span></a></li>
                            <li><a href="{{ url('account-heads') }}"><i class="fa fa-circle"></i> <span>Account Heads</span></a></li>
                            <li><a href="{{ url('account-types') }}"><i class="fa fa-circle"></i> <span>Account Types</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
            
        </ul>
        
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
