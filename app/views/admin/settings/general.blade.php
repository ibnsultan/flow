@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-3 position-relative">
                            <h5>
                                {{__('General Settings')}}
                            </h5>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="updateSettings" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <! -- Site Name -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Site Name')}}</label>
                                            <input type="text" class="form-control" name="site_name" value="{{ settings->site_name }}">
                                        </div>
                                    </div>

                                    <! -- Site URL -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Site URL')}}</label>
                                            <input type="text" class="form-control" name="site_url" value="{{ settings->site_url }}">
                                        </div>
                                    </div>

                                    <! -- color preset -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Theme Color')}}</label>
                                            <input type="text" name="color_preset" id="theme_preset" value="{{ settings->theme_color }}" hidden>
                                            <div>
                                                <li class="list-group-item">
                                                    <div class="theme-color preset-color">
                                                        <a href="javascript:void(0)" data-value="preset-1"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-2"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-3"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-4"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-5"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-6"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-7"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-8"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-9"><i class="ti ti-check"></i></a>
                                                        <a href="javascript:void(0)" data-value="preset-10"><i class="ti ti-check"></i></a>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- default layout -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" >{{__('Default Layout')}}</label>
                                            <input type="text" name="theme_layout" id="default_layout" value="{{ settings->theme_layout }}" hidden/>
                                            <div class="row theme-direction">
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <button type="button" class="preset-btn layout-preset btn" data-value="false" data-input="ltr">
                                                            <img src="/assets/images/customizer/img-layout-1.svg" alt="img" class="img-fluid h-100">
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-grid">
                                                        <button type="button" class="preset-btn layout-preset btn" data-value="true" data-input="rtl">
                                                            <img src="/assets/images/customizer/img-layout-2.svg" alt="img" class="img-fluid h-100">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <! -- favicon -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Favicon')}}</label>
                                            <input type="file" class="form-control" name="favicon" accept="image/*">
                                        </div>
                                    </div>

                                    <! -- light logo -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Light Logo')}}</label>
                                            <input type="file" class="form-control" name="logo_light" accept="image/*">
                                        </div>
                                    </div>

                                    <! -- dark logo -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('Dark Logo')}}</label>
                                            <input type="file" class="form-control" name="logo_dark" accept="image/*">
                                        </div>
                                    </div>

                                    <! -- system version -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">{{__('System Version')}}</label>
                                            <input type="text" class="form-control" name="system_version" value="{{ settings->system_version }}">
                                        </div>
                                    </div>

                                    
                                    <!-- submit button -->
                                    <div class="col-md-12 col-sm-12 text-center mt-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary rounded">{{__('UPDATE SETTINGS')}}</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection