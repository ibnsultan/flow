@extends('layouts.app')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">
			<div class="container-fluid">

                <div class="row">
                
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header m-0">
                                <h3 class="card-title">Welcome to <span class="text-primary">{{$settings->site_name}}</span></h3>
                            </div>
                            <div class="card-body">
                                <p>Flow is a comprehensive web application development starter kit designed to accelerate the process of building modern and feature-rich web applications. With a focus on simplicity, flexibility, and efficiency, Flow provides developers with a robust set of tools and features to kickstart their projects. From secure authentication and seamless API integration to beautifully designed UI/UX components and powerful admin tools</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-2">

                    @foreach ([
                        [
                            'icon' => 'fa-sharp-duotone fa-solid fa-helmet-battle',
                            'title' => 'Authentication',
                            'desc' => 'Flow provides robust authentication mechanisms, ensuring that only authorized users can access your application\'s resources'
                        ],
                        [
                            'icon' => 'fa-sharp-duotone fa-solid fa-webhook',
                            'title' => 'API Integration',
                            'desc' => 'Flow comes equipped with a versatile and ready-to-use API, allowing seamless integration with external systems and services'
                        ],
                        [
                            'icon' => 'fa-sharp-duotone fa-solid fa-swatchbook',
                            'title' => 'Well-Designed UI/UX',
                            'desc' => 'With Flow, you get access to a collection of well-designed UI components and intuitive UX patterns. From responsive layouts to interactive elements'
                        ],
                        [
                            'icon' => 'fa-sharp-duotone fa-solid fa-tools',
                            'title' => 'Admin Tools',
                            'desc' => 'Flow provides a user-friendly admin dashboard that streamlines administrative tasks. With features such as user management, settings, etc'
                        ]
                    ] as $feature)

                        <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                
                                    <h5 class="card-title mb-4">
                                        <i class="{{$feature['icon']}} flow-feature-icon position-absolute"
                                            style="font-size: 5rem; opacity:0.1; right: 1rem;"></i>
                                        <span class="flow-feauture-title">{{$feature['title']}}</span>
                                    </h5>
                                    <p class="flow-feature-desc">{{$feature['desc']}}</p>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
            
                </div>

            </div>			
		</div>
	</div>
@endsection