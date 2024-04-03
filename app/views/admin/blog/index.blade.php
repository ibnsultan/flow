@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{_('Posts')}}
                            </h5> 
                            <a class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" href="/admin/blog/article/write">
                                {{_('Add New')}}
                            </a>              
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($articles) > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="w-50">{{_('Title')}}</th>
                                                <th>{{_('Author')}}</th>
                                                <th>{{_('Category')}}</th>
                                                <th>{{_('Published')}}</th>
                                                <th>{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($articles as $article)

                                                <tr>
                                                    <td>
                                                        <a href="/admin/blog/article/edit/{{ \App\Helpers\Helpers::encode($article->id) }}">
                                                            {{ $article->title }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $article->user->fullname }}
                                                    </td>
                                                    <td>
                                                        {{ $article->blog_category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $article->created_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <a href="/admin/blog/article/edit/{{ \App\Helpers\Helpers::encode($article->id) }}" class="btn btn-primary rounded btn-sm">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <button class="btn btn-danger rounded btn-sm"
                                                            onclick="deleteArticle('{{ \App\Helpers\Helpers::encode($article->id) }}')">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </td>

                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center">
                                    <h5>{{_('No posts found')}}</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection