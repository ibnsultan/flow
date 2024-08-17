<header class="pc-header">
    <div class="header-wrapper">

        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
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
                <li class="pc-h-item pt-3">
                    <h5> {{ $title }} </h5>
                </li>
            </ul>
        </div>

        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false" >
                        <i class="fa-solid fa-cowbell"></i>
                    </a>

                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">{{__('Notifications')}}</h5>
                        </div>
                        <div class="dropdown-body text-wrap header-notification-scroll position-relative">
                            @if($notifications::user_list(auth()->id())->count())
                                @foreach($notifications::user_list(auth()->id())->get() as $notification)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ $notification->avatar }}" alt="user-image" class="user-avtar wid-35" style="aspect-ration:1/1"/>
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
                                @include('layouts.app.empty')
                            @endif
                        </div>
                    </div>
                </li>

                <!-- user profile section -->
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="javascript:void(0)" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false" >
                        <img src="{{ auth()->user()['avatar'] }}" alt="user-image" class="user-avtar" style="aspect-ration:1/1"/>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="{{ auth()->user()['avatar'] }}" alt="user-image" class="user-avtar wid-35" style="aspect-ration:1/1"/>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">{{ auth()->user()['fullname'] }} 🖖</h6>
                                        <span>{{ auth()->user()['email'] }}</span>
                                    </div>
                                </div>
                                <hr class="border-secondary border-opacity-50" />

                                <div class="card">
                                    <div class="card-body py-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">
                                                <span class="m-1">{{ __('Dark Mode') }}</span>
                                            </h5>
                                            <div class="form-check form-switch form-check-reverse m-0">
                                                <input class="form-check-input f-18" id="switchDarkMode" type="checkbox" role="switch">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <a href="{{ route('my.profile') }}" class="dropdown-item">
                                    <span>
                                        <i class="fa-solid fa-user"></i>
                                        <span>{{__('My Profile')}}</span>
                                    </span>
                                </a>

                                <!--announcements-->
                                @if($modules->announcement)
                                    <a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#announcement" aria-controls="announcement">
                                        <span>
                                            <i class="fa-solid fa-bullhorn"></i>
                                            <span>{{__('Announcements')}}</span>
                                        </span>
                                    </a>
                                @endif

                                @if($langs::active()->count())
                                    <a class="dropdown-item">
                                        <span class="d-flex align-items-center">
                                            <i class="fa-solid fa-globe"></i>
                                            <span>{{ __('Languages') }}</span>
                                        </span>
                                        <span class="flex-shrink-0">
                                            <select id="inputChangeLang" class="bg-transparent border-0 shadow-none">
                                                <option value="en">{{ __('Default') }}</option>
                                                @foreach($langs::active() as $lang)
                                                    <option value="{{ $lang->iso }}" {{ $lang->iso == cookie()::get('lang') ? 'selected' : '' }}>
                                                        {{ $lang->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </a>
                                @endif
                                
                                <hr class="border-secondary border-opacity-50" />

                                @if($modules->api)
                                    <a href="{{ route('api.manage') }}" class="dropdown-item">
                                        <span>
                                            <i class="fa-solid fa-webhook"></i>
                                            <span>{{__('API Settings')}}</span>
                                        </span>
                                    </a>
                                @endif

                                @if($helpers::isAdmin())
                                    <a href="/admin" class="dropdown-item">
                                        <span>
                                            <i class="fa-solid fa-gear"></i>
                                            <span>{{__('Admin Settings')}}</span>
                                        </span>
                                    </a>
                                @endif

                                <!--a href="javascript:void(0)" class="dropdown-item">
                                    <span>
                                        <i class="ti ti-headset"></i>
                                        <span>{{__('support')}}</span>
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