<nav class="pc-sidebar">
    <div class="navbar-wrapper">

        <div class="m-header">
            <a href="javascript:void(0)" class="b-brand text-primary">
                <img src="{{ $settings->logo_dark }}" class="w-75"/>
                <span class="badge bg-light-success rounded-pill ms-2 theme-version">{{ $settings->system_version }}</span>
            </a>
        </div>

        <div class="navbar-content pc-trigger">
        
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>{{ __('Navigation') }}</label>
                </li>
                
                <li class="pc-item">
                    <a href="/admin" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="grid"></i>
                        </span>                            
                        <span class="pc-mtext">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="/app/home" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="feather"></i>
                        </span>
                        <span class="pc-mtext">{{ __('App Home') }}</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>{{ __('CMS') }}</label>
                </li>

                <!-- blog -->
                @if($handler::can('blog', 'read', ['all', 'owned', 'added'])->status)
                    <li class="pc-item pc-hasmenu">
                        <a href="javascript:void(0)" class="pc-link">
                            <span class="pc-micon">
                                <i data-feather="file-text"></i>
                            </span>
                            <span class="pc-mtext">{{ __('Blog') }}</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item">
                                <a href="/admin/blog" class="pc-link">
                                    <span class="pc-mtext">{{ __('Posts') }}</span>
                                </a>
                            </li>
                            @if($handler::can('blog', 'view_blog_categories')->status)
                                <li class="pc-item">
                                    <a href="/admin/blog/categories" class="pc-link">
                                        <span class="pc-mtext">{{ __('Categories') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- pages -->
                @if($handler::can('page', 'read', ['all', 'owned', 'added'])->status)
                    <li class="pc-item pc-hasmenu">
                        <a href="javascript:void(0)" class="pc-link">
                            <span class="pc-micon">
                                <i data-feather="file"></i>
                            </span>
                            <span class="pc-mtext">{{ __('Pages') }}</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item">
                                <a href="/admin/pages" class="pc-link">
                                    <span class="pc-mtext">{{ __('All Pages') }}</span>
                                </a>
                            </li>
                            <li class="pc-item">
                                <a href="/admin/pages/add" class="pc-link">
                                    <span class="pc-mtext">{{ __('Add Page') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- announcements -->
                @if($handler::can('announcement', 'read')->status)
                    <li class="pc-item">
                        <a href="/admin/announcement" class="pc-link">
                            <span class="pc-micon">
                                <i data-feather="zap"></i>
                            </span>
                            <span class="pc-mtext">{{ __('Announcement') }}</span>
                        </a>
                    </li>
                @endif

                <!-- translations -->
                <li class="pc-item">
                    <a href="{{ route('language.list') }}" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="globe"></i>
                        </span>
                        <span class="pc-mtext">{{ __('Translations') }}</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>{{ __('Management') }}</label>
                </li>

                <! -- users -->
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="users"></i>
                        </span>
                        <span class="pc-mtext">{{ __('Users') }}</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="/admin/users/all" class="pc-link">
                                <span class="pc-mtext">{{ __('Subscribers') }}</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="/admin/users/moderator" class="pc-link">
                                <span class="pc-mtext">{{ __('Moderators') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <! -- roles -->
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="shield"></i>
                        </span>
                        <span class="pc-mtext">{{ __('Access') }}</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">

                        <!-- modules -->
                        @if($handler::can('app', 'view_modules')->status)
                            <li class="pc-item">
                                <a href="/admin/access/modules" class="pc-link">
                                    <span class="pc-mtext">{{ __('Modules') }}</span>
                                </a>
                            </li>

                            <!-- submodules ->
                            <li class="pc-item">
                                <a href="/admin/access/sub-modules" class="pc-link">
                                    <span class="pc-mtext">{{ __('SubModules') }}</span>
                                </a>
                            </li-->
                        @endif

                        <!-- permissions -->
                        @if($handler::can('app', 'view_permissions')->status)
                            <li class="pc-item">
                                <a href="/admin/access/permissions" class="pc-link">
                                    <span class="pc-mtext">{{ __('Permissions') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <! -- settings -->
                @if($handler::can('app', 'view_settings')->status)
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="settings"></i>
                        </span>
                        <span class="pc-mtext">{{ __('Settings') }}</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">

                        <!-- general settings -->
                        <li class="pc-item">
                            <a href="/admin/settings/general" class="pc-link">
                                <span class="pc-mtext">{{ __('General') }}</span>
                            </a>
                        </li>
                    

                        <!-- seo settings -->
                        <li class="pc-item">
                            <a href="/admin/settings/seo" class="pc-link">
                                <span class="pc-mtext">{{ __('SEO') }}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>