@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>{{ __('Categories') }}</h5>

                            @if($addCategoryPermission->status)
                                <button class="btn btn-primary position-absolute" 
                                    style="top:0.8rem;right:2rem;"
                                    data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                    {{ __('Add New Category') }}
                                </button>
                            @endif          
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if($categories->count())
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Category') }}</th>
                                                <th>{{ __('Description') }}</th>
                                                <th class="text-center">{{ __('Articles') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)                                                
                                                <tr>
                                                    <td>{{ $category->name }}</td>
                                                    <td class="w-50">{{ $category->description ?? __('No Description') }}</td>
                                                    <td class="text-center">{{ $category->blog_article->count() }}</td>
                                                    <td class="text-end">

                                                        <!-- Edit the category -->
                                                        @if($editCategoryPermission->status)
                                                            <button class="btn btn-primary rounded btn-sm"
                                                                onclick="editCategory(
                                                                    '{{ $helpers::encode($category->id) }}',
                                                                    '{{ $category->name }}',
                                                                    '{{ $category->description }}'
                                                                )">
                                                                <i class="ti ti-pencil"></i>
                                                            </button>
                                                        @endif

                                                        <!-- Delete the category -->
                                                        @if($deleteCategoryPermission->status)
                                                            <button class="btn btn-danger rounded btn-sm"
                                                                onclick="deleteCategory('{{ $helpers::encode($category->id) }}')">
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

    @include('admin.blog.partials.add-category')
    @include('admin.blog.partials.edit-category')

@endsection