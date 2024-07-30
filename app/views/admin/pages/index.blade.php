@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 position-relative">
                            <h5>{{ __('Pages') }}</h5>

                            @if($addPagePermission->status)
                                <a class="btn btn-primary position-absolute" 
                                    style="top:0.8rem;right:2rem;" href="/admin/pages/add">
                                    {{ __('Add New Page') }}
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
                            @if($pages->count())
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Short') }}</th>
                                                <th class="text-center">{{ __('Status') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pages as $page)
                                                <tr>
                                                    <td>{{ $page->title }}</td>
                                                    <td>{{ substr(strip_tags(html_entity_decode($page->content)), 0, 100) }}</td>
                                                    <td class="text-center">
                                                        @if($page->status == 'live')
                                                            <span class="badge bg-success"> {{ __('Published') }} </span>
                                                        @else
                                                            <span class="badge bg-danger"> {{ __('Draft') }} </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">

                                                        <!-- Edit the page -->
                                                        @if($editPagePermission->status)
                                                            <a href="/admin/pages/edit/{{ $helpers::encode($page->id) }}" 
                                                                class="btn btn-sm btn-primary rounded">
                                                                <i class="ti ti-pencil"></i>
                                                            </a>
                                                        @endif

                                                        <!-- Delete the page -->
                                                        @if($deletePagePermission->status)
                                                            <button class="btn btn-sm btn-danger rounded" onclick="deletePage('{{ $helpers::encode($page->id) }}')">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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