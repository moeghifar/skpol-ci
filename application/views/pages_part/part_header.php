<header id="header" class="navbar">
    <!-- START navbar header -->
    <div class="navbar-header">
        <!-- Brand -->
        <a class="navbar-brand" href="javascript:void(0);">
            <span class="logo-figure"></span>
            <span class="logo-text"></span>
        </a>
        <!--/ Brand -->
    </div>
    <!--/ END navbar header -->

    <!-- START Toolbar -->
    <div class="navbar-toolbar clearfix">
        <!-- START Left nav -->
        <ul class="nav navbar-nav navbar-left">
            <!-- Sidebar shrink -->
            <li class="hidden-xs hidden-sm">
                <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                    <span class="meta">
                        <span class="icon"></span>
                    </span>
                </a>
            </li>
            <!--/ Sidebar shrink -->

            <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
            <li class="navbar-main hidden-lg hidden-md hidden-sm">
                <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                    <span class="meta">
                        <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                    </span>
                </a>
            </li>
            <!--/ Offcanvas left -->

        </ul>
        <!--/ END Left nav -->

        <!-- START Right nav -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Profile dropdown -->
            <li class="dropdown profile navbar-main">
                <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                    <div class="has-icon">
                        <span class="meta">
                            <i class="ico-user form-control-icon"></i>
                            <span class="text hidden-xs hidden-sm pl5"><?=$this->session->userdata($this->session_prefix.'-username')?></span>
                            <span class="caret"></span>
                        </span>
                    </div>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?=site_url('logout')?>"><span class="icon"><i class="ico-exit"></i></span> Log Out</a></li>
                </ul>
            </li>
            <!-- Profile dropdown -->

            <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->

            <!--/ Offcanvas right -->
        </ul>
        <!--/ END Right nav -->
    </div>
    <!--/ END Toolbar -->
</header>
