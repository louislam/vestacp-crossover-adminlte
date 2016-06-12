<div class="template">

    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>V</b>CP</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Vesta</b>CP</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <span class="username hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat btn-profile">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat btn-logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">

            <form action="/search/" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>

            <ul class="sidebar-menu">
            </ul>
        </section>
    </aside>

    <div class="modal fade modal-setting" id="modal-setting"  tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">AdminLTE Settings</h4>
                </div>
                <div class="modal-body">
                    <p>Boxed Layout:</p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" onclick="louisAdminLTE.setLayoutBoxed(true)">Enable</button>
                        <button type="button" class="btn btn-default" onclick="louisAdminLTE.setLayoutBoxed(false)">Disable</button>
                    </div>
<br /><br />
                    <p>Skin:</p>
                    <div class="skin-block" data-skin="skin-blue"></div>
                    <div class="skin-block" data-skin="skin-yellow"></div>
                    <div class="skin-block" data-skin="skin-green"></div>
                    <div class="skin-block" data-skin="skin-purple"></div>
                    <div class="skin-block" data-skin="skin-red"></div>
                    <div class="skin-block" data-skin="skin-black"></div>
                    <div class="skin-block" data-skin="skin-blue-light"></div>
                    <div class="skin-block" data-skin="skin-yellow-light"></div>
                    <div class="skin-block" data-skin="skin-green-light"></div>
                    <div class="skin-block" data-skin="skin-purple-light"></div>
                    <div class="skin-block" data-skin="skin-red-light"></div>
                    <div class="skin-block" data-skin="skin-black-light"></div>
                </div>

            </div>
        </div>
    </div>

</div>