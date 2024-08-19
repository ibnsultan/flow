<!-- To have a default hidden sidebar, add the class `pc-sidebar-hide` -->
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
                    <label>{{__('Navigation')}}</label>
                    <i class="ph-duotone ph-gauge"></i>
                </li>
                
                <li class="pc-item">
                    <a href="/app/home" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-squares-four"></i>
                        </span>
                        <span class="pc-mtext">{{__('Dashboard')}}</span>
                    </a>
                </li>

                
                <li class="pc-item">
                    <a href="/app/start" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-rocket"></i>
                        </span>
                        <span class="pc-mtext">{{__('Template')}}</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-tree-structure"></i>
                        </span>
                        <span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 2.1</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="javascript:void(0)" class="pc-link"
                                >Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                                ></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="javascript:void(0)" class="pc-link"
                                        >Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                                        ></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 4.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu">
                            <a href="javascript:void(0)" class="pc-link"
                                >Level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                                ></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 3.1</a></li>
                                <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 3.2</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="javascript:void(0)" class="pc-link"
                                        >Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span
                                        ></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="javascript:void(0)">Level 4.2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>