<section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
        @if(\Illuminate\Support\Facades\Auth::user()->user_role == "admin")
        <li class="header"></li>
        @if (Request::is('/*'))
        <li class="active">
            @else
        <li>
            @endif
            <a href="{{ url('') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        @endif

        @if (Request::is('certificate*'))
        <li class="active">
            @else
        <li>
            @endif
            <a href="{{ url('certificate') }}">
                <i class="fa fa-th"></i> <span>Certification Management</span>
            </a>
        </li>

        @if (Request::is('account*'))
        <li class="active">
            @else
        <li>
            @endif
            <a href="{{ url('account') }}">
                <i class="fa fa-user"></i><span>Account Management</span>
            </a>

        </li>
    </ul>
</section>