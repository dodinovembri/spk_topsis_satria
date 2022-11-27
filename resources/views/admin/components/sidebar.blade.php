<aside class="app-side" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-profile -->
        <div class="user-profile">
            <img src="{{ asset('users') }}/{{ auth()->user()->image }}" class="profile-thumb" alt="User Thumb">
            <h6 class="profile-name">{{ auth()->user()->name }}</h6>
        </div>
        <!-- END .user-profile -->
        <!-- BEGIN .side-nav -->
        <nav class="side-nav">
            <!-- BEGIN: side-nav-content -->
            <ul class="unifyMenu" id="unifyMenu">
                <li class="menu-header">
                    -- Main
                </li>
                <li class="{{ (Request::is('home')) ? 'active selected' : '' }}">
                    <a href="{{ url('home') }}">
                        <span class="has-icon">
                            <i class="icon-layers3"></i>
                        </span>
                        <span class="nav-title">Dashboard</span>
                    </a>
                </li>                
                <li class="{{ (Request::is('admin/alternative')) || (Request::is('admin/alternative/*')) ? 'active selected' : '' }}">
                    <a href="{{ url('admin/alternative') }}">
                        <span class="has-icon">
                            <i class="icon-laptop_windows"></i>
                        </span>
                        <span class="nav-title">Alternatif</span>
                    </a>
                </li>
                <li class="{{ (Request::is('admin/ranking')) || (Request::is('admin/ranking/*')) ? 'active selected' : '' }}">
                    <a href="{{ url('admin/ranking') }}">
                        <span class="has-icon">
                            <i class="icon-bookmarks"></i>
                        </span>
                        <span class="nav-title">Ranking</span>
                    </a>
                </li>
                <li class="{{ (Request::is('admin/feedback')) || (Request::is('admin/feedback/*')) ? 'active selected' : '' }}">
                    <a href="{{ url('admin/feedback') }}">
                        <span class="has-icon">
                            <i class="icon-happy"></i>
                        </span>
                        <span class="nav-title">Feedback</span>
                    </a>
                </li>
                <li class="menu-header">
                    -- General Setting
                </li>
                <li class="{{ (Request::is('admin/criteria')) || (Request::is('admin/criteria/*')) ? 'active selected' : '' }}">
                    <a href="{{ url('admin/criteria') }}">
                        <span class="has-icon">
                            <i class="icon-document3"></i>
                        </span>
                        <span class="nav-title">Kriteria</span>
                    </a>
                </li>
                <li class="{{ (Request::is('admin/slider')) || (Request::is('admin/slider/*')) ? 'active selected' : '' }}">
                    <a href="{{ url('admin/slider') }}">
                        <span class="has-icon">
                            <i class="icon-bookmarks"></i>
                        </span>
                        <span class="nav-title">Gambar Slider</span>
                    </a>
                </li>
                <li class="{{ (Request::is('admin/facility')) || (Request::is('admin/facility/*')) ? 'active selected' : '' }}">
                    <a href="{{ url('admin/facility') }}">
                        <span class="has-icon">
                            <i class="icon-bookmarks"></i>
                        </span>
                        <span class="nav-title">Fasilitas</span>
                    </a>
                </li>
            </ul>
            <!-- END: side-nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>