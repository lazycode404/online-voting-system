<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ ucfirst(Auth::user()->username) }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->role }}</a>
        </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li class="{{ 'admin/dashboard' == request()->path() ? 'active' : '' }}">
            <a href="/admin/dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role == 'SYSTEM ADMINISTRATOR' || Auth::user()->role == 'ADMINISTRATOR')
        <li class="treeview {{request()->is('admin/accounts/view') || request()->is('admin/accounts/create') ? 'active menu-open' : ''}}">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Administration</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{'admin/accounts/view' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/accounts/view"><i class="fa fa-circle-o"></i> View Accounts</a>
                </li>
                <li class="{{'admin/accounts/create' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/accounts/create"><i class="fa fa-circle-o"></i> Create Accounts</a>
                </li>
            </ul>
        </li>
        @endif

        <li class="treeview {{request()->is('admin/election/view') || request()->is('admin/election/create') ? 'active menu-open' : ''}}">
            <a href="#">
                <i class="fa fa-empire" aria-hidden="true"></i>
                <span>Election</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{'admin/election/view' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/election/view"><i class="fa fa-circle-o"></i> View Election</a>
                </li>
                <li class="{{'admin/election/create' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/election/create"><i class="fa fa-circle-o"></i> Create Election</a>
                </li>
            </ul>
        </li>

        @if (Auth::user()->role == 'SYSTEM ADMINISTRATOR' || Auth::user()->role == 'ADMINISTRATOR')
        <li class="treeview {{request()->is('admin/position/view') || request()->is('admin/position/create') ? 'active menu-open' : ''}}">
            <a href="#">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <span>Position</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{'admin/position/view' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/position/view"><i class="fa fa-circle-o"></i> View Position</a>
                </li>
                <li class="{{'admin/position/create' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/position/create"><i class="fa fa-circle-o"></i> Create Position</a>
                </li>
            </ul>
        </li>
        @endif

        @if (Auth::user()->role == 'SYSTEM ADMINISTRATOR' || Auth::user()->role == 'ADMINISTRATOR')
        <li class="treeview {{request()->is('admin/candidate/view') || request()->is('admin/candidate/create') ? 'active menu-open' : ''}}">
            <a href="#">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                <span>Candidate</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{'admin/candidate/view' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/candidate/view"><i class="fa fa-circle-o"></i> View Candidate</a>
                </li>
                <li class="{{'admin/candidate/create' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/candidate/create"><i class="fa fa-circle-o"></i> Create Candidate</a>
                </li>
            </ul>
        </li>

        <li class="treeview {{request()->is('admin/voter/view') || request()->is('admin/voter/create') ? 'active menu-open' : ''}}">
            <a href="#">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <span>Voters</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{'admin/voter/view' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/voter/view"><i class="fa fa-circle-o"></i> View Voters</a>
                </li>
                <li class="{{'admin/voter/create' == request()->path() ? 'active' : ''}}">
                    <a href="/admin/voter/create"><i class="fa fa-circle-o"></i> Create Voters</a>
                </li>
            </ul>
        </li>

        <li class="{{ 'admin/settings' == request()->path() ? 'active' : '' }}">
            <a href="/admin/settings">
                <i class="fa fa-gear"></i> <span>Settings</span>
            </a>
        </li>

        <li class="{{ 'admin/votes' == request()->path() ? 'active' : '' }}">
            <a href="/admin/votes">
                <i class="fa fa-list"></i> <span>Votes</span>
            </a>
        </li>
        @endif


        <li class="header">EXIT</li>
        <li class="">
            <a href="{{ route('admin.logout') }}">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
        </li>
    </ul>
</section>
