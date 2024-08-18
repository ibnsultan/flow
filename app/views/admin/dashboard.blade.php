@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s position-absolute end-40" style="opacity:0.1;">
                                        <i class="text-warning flow-feature-iconfa-sharp-duotone fa-solid fa-users" style="font-size: 5rem;"></i>
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
                                    <div class="avtar avtar-s position-absolute end-40" style="opacity:0.1;">
                                        <i class="text-success flow-feature-iconfa-sharp-duotone fa-solid fa-key" style="font-size: 5rem;"></i>
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
                                    <div class="avtar avtar-s position-absolute end-40" style="opacity:0.1;">
                                        <i class="fa-duotone fa-solid fa-align-right" style="font-size: 5rem;"></i>
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
                                    <div class="avtar avtar-s position-absolute end-40" style="opacity:0.1;">
                                        <i class="text-danger flow-feature-iconfa-sharp-duotone fa-solid fa-file-alt" style="font-size: 5rem;"></i>
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