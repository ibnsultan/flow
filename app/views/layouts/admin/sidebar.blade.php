<nav class="pc-sidebar">
    <div class="navbar-wrapper">

        <div class="m-header">
            <a href="#" class="b-brand text-primary">
                <img src="{{ settings->get('logo_dark') }}" class="w-75"/>
                <span class="badge bg-light-success rounded-pill ms-2 theme-version">{{ settings->get('system_version') }}</span>
            </a>
        </div>

        <div class="navbar-content pc-trigger">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ auth()->user()['avatar'] }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0"> {{ auth()->user()['fullname'] }} </h6>
                            <small>{{ auth()->user()['role'] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>{{_('Navigation')}}</label>
                </li>
                
                <li class="pc-item">
                    <a href="/admin" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="grid"></i>
                        </span>                            
                        <span class="pc-mtext">{{_('Dashboard')}}</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="/app/home" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="globe"></i>
                        </span>
                        <span class="pc-mtext">{{_('App Home')}}</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>{{_('CMS')}}</label>
                </li>

                <!-- blog -->
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="file-text"></i>
                        </span>
                        <span class="pc-mtext">{{_('Blog')}}</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="/admin/blog" class="pc-link">
                                <span class="pc-mtext">{{_('Posts')}}</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/admin/blog/categories" class="pc-link">
                                <span class="pc-mtext">{{_('Categories')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-caption">
                    <label>{{_('Management')}}</label>
                </li>

                <! -- users -->
                <li class="pc-item">
                    <a href="/admin/users" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="users"></i>
                        </span>
                        <span class="pc-mtext">{{_('Users')}}</span>
                    </a>
                </li>

                <! -- roles -->
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="shield"></i>
                        </span>
                        <span class="pc-mtext">{{_('Privileges')}}</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="/admin/roles" class="pc-link" onclick="underDevelopment()">
                                <span class="pc-mtext">{{_('Roles')}}</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/admin/permissions" class="pc-link" onclick="underDevelopment()">
                                <span class="pc-mtext">{{_('Permissions')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <! -- settings -->
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="settings"></i>
                        </span>
                        <span class="pc-mtext">{{_('Settings')}}</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="/admin/settings" class="pc-link" onclick="underDevelopment()">
                                <span class="pc-mtext">{{_('General')}}</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/admin/settings/seo" class="pc-link" onclick="underDevelopment()">
                                <span class="pc-mtext">{{_('SEO')}}</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/admin/settings/translations" class="pc-link" onclick="underDevelopment()">
                                <span class="pc-mtext">{{_('Translations')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <! -- announcements -->

            </ul>
        </div>
    </div>
</nav>