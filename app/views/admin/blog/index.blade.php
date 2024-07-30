@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 position-relative">
                            <h5>{{ __('Posts') }}</h5>
                            @if($addArticlePermission->status)
                                <a class="btn btn-primary position-absolute" 
                                    style="top:0.8rem;right:2rem;" href="/admin/blog/article/write">
                                    {{ __('Add New Article') }}
                                </a>
                            @endif        
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($articles) > 0)
                                @include('admin.blog.tables.list')
                            @else
                                @include('app.partials.empty')
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection