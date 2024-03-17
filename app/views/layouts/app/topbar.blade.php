<header class="pc-header">
    <div class="header-wrapper">
        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="javascript:void(0)" class="pc-head-link ms-0" id="sidebar-hide">
                    <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="javascript:void(0)" class="pc-head-link ms-0" id="mobile-collapse">
                    <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search"
                       data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-search-normal-1"></use>
                        </svg>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3 py-2">
                            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="javascript:void(0)"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                        >
                        <svg class="pc-icon">
                            <use xlink:href="#custom-sun-1"></use>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="javascript:void(0)" class="dropdown-item" onclick="change_theme_color('dark')">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-moon"></use>
                            </svg>
                            <span>Dark</span>
                        </a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="change_theme_color('light')">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sun-1"></use>
                            </svg>
                            <span>Light</span>
                        </a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="layout_change_default()">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-setting-2"></use>
                            </svg>
                            <span>Default</span>
                        </a>
                    </div>
                </li>
                <li class="pc-h-item">
                    <a href="javascript:void(0)" class="pc-head-link me-0" data-bs-toggle="offcanvas" data-bs-target="#announcement" aria-controls="announcement">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-flash"></use>
                        </svg>
                    </a>
                </li>
                
                
                @php // Notifications Section
                    $notifications = new App\Controllers\App\NotificationsController();
                    $notificationCount = count($notifications->userNotifications());
                @endphp
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false" >
                        <svg class="pc-icon">
                            <use xlink:href="#custom-notification"></use>
                        </svg>
                        <span class="badge bg-success pc-h-badge">{{ $notificationCount }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">{{_('Notifications')}}</h5>
                            @if( $notificationCount )
                                <a href="javascript:void(0)" class="btn btn-link btn-sm">Mark all read</a>
                            @endif
                        </div>
                        <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">

                            @if( $notificationCount )

                                @foreach ($notifications->userNotifications() as $notification)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="float-end text-sm text-muted">{{ $notification->created_at->diffForHumans() }}</span>
                                                    <h5 class="text-body mb-2">{{ $notification->title }}</h5>
                                                    <p class="mb-0">{{ $notification->message }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else

                                <div class="text-center py-2">
                                    <p class="text-muted">No new notifications</p>
                                </div>

                            @endif

                        </div>
                        <div class="text-center py-2">
                            <a href="javascript:void(0)" class="link-danger">Clear all Notifications</a>
                        </div>
                    </div>
                    
                </li>

                <!-- user profile section -->
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="javascript:void(0)" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false" >
                        <img src="{{ auth()->user()['avatar'] }}" alt="user-image" class="user-avtar" />
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">{{_('profile')}}</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="{{ auth()->user()['avatar'] }}" alt="user-image" class="user-avtar wid-35" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">{{ auth()->user()['fullname'] }} 🖖</h6>
                                        <span>{{ auth()->user()['email'] }}</span>
                                    </div>
                                </div>
                                <hr class="border-secondary border-opacity-50" />
                                
                                <a href="/app/profile/view" class="dropdown-item">
                                    <span>
                                        <i class="ti ti-user text-muted me-2"></i>
                                        <span>{{_('My Profile')}}</span>
                                    </span>
                                </a>

                                @if(settings->get('allow_apis') == 'true')
                                <a href="/app/api/manage" class="dropdown-item">
                                    <span>
                                        <i class="ti ti-code"></i>
                                        <span>{{_('API Settings')}}</span>
                                    </span>
                                </a>
                                @endif

                                @if(\App\Helpers\Helpers::isAdmin())
                                <a href="/admin" class="dropdown-item">
                                    <span>
                                        <i class="ti ti-settings"></i>
                                        <span>{{_('Admin Settings')}}</span>
                                    </span>
                                </a>
                                @endif

                                <!--a href="javascript:void(0)" class="dropdown-item">
                                    <span>
                                        <i class="ti ti-headset"></i>
                                        <span>{{_('support')}}</span>
                                    </span>
                                </a-->

                                <hr class="border-secondary border-opacity-50" />
                                <div class="d-grid mb-3">
                                    <a href='/auth/logout' class="btn btn-primary">
                                        <svg class="pc-icon me-2">
                                            <use xlink:href="#custom-logout-1-outline"></use>
                                        </svg>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>