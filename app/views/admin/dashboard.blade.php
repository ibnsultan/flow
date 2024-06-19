@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header position-relative">
                            <h5>
                                {{__('Dashboard')}}
                            </h5>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-warning">
                                        <i data-feather="users" class="text-warning"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">{{ __('Users') }}</h6>
                                </div>
                            </div>
                            <div class="p-3 mt-0">
                                <div class="mt-3 row align-items-center">
                                    <h1 class="mb-0 text-start">{{ $stats['users'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-success">
                                        <i data-feather="code" class="text-success"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">{{ __('API Keys') }}</h6>
                                </div>
                            </div>
                            <div class="p-3 mt-0">
                                <div class="mt-3 row align-items-center">
                                    <h1 class="mb-0 text-start">{{ $stats['api_keys'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-primary">
                                        <i data-feather="file-text" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">{{ __('Articles') }}</h6>
                                </div>
                            </div>
                            <div class="p-3 mt-0">
                                <div class="mt-3 row align-items-center">
                                    <h1 class="mb-0 text-start">{{ $stats['articles'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-info">
                                        <i data-feather="file" class="text-info"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">{{ __('Pages') }}</h6>
                                </div>
                            </div>
                            <div class="p-3 mt-0">
                                <div class="mt-3 row align-items-center">
                                    <h1 class="mb-0 text-start">{{ $stats['pages'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection 