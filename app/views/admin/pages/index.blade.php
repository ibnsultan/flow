@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{__('Pages')}}
                            </h5>
                            <a class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" href="/admin/pages/add">
                                {{__('Add New')}}
                            </a>             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($pages))

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{__('Title')}}</th>
                                                <th>{{__('Short')}}</th>
                                                <th class="text-center">{{__('Status')}}</th>
                                                <th class="text-end">{{__('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($pages as $page)
                                                <tr>
                                                    <td>{{ $page->title }}</td>
                                                    <td>{{ substr(strip_tags(html_entity_decode($page->content)), 0, 100) }}</td>
                                                    <td class="text-center">
                                                        @if($page->status == 'live')
                                                            <span class="badge bg-success"> {{__('Published')}} </span>
                                                        @else
                                                            <span class="badge bg-danger"> {{__('Draft')}} </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="/admin/pages/edit/{{ \App\Helpers\Helpers::encode($page->id) }}" 
                                                            class="btn btn-sm btn-primary rounded">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger rounded" onclick="deletePage('{{ \App\Helpers\Helpers::encode($page->id) }}')">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>

                            @else

                                <div class="text-center">
                                    {{__('No pages found.')}}
                                </div>
                            
                            @endif

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection