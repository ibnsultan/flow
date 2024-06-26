@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{__('Categories')}}
                            </h5> 
                            <button class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;"
                                data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                {{__('Add New')}}
                            </button>              
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        
                            @if(count($categories) > 0)

                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{__('Category')}}</th>
                                                <th>{{__('Description')}}</th>
                                                <th>{{__('No. Articles')}}</th>
                                                <th class="text-end">{{__('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)                                                
                                                    <tr>
                                                        <td>
                                                            {{ $category->name }}
                                                        </td>
                                                        <td class="w-50">
                                                            {{ $category->description ?? _('No Description') }}
                                                        </td>
                                                        <td>
                                                            {{ $category->blog_article->count() }}
                                                        </td>
                                                        <td class="text-end">
                                                            <button class="btn btn-primary rounded btn-sm"
                                                                onclick="editCategory(
                                                                    '{{ \App\Helpers\Helpers::encode($category->id) }}',
                                                                    '{{ $category->name }}',
                                                                    '{{ $category->description }}'
                                                                )">
                                                                <i class="ti ti-pencil"></i>
                                                            </button>
                                                            <button class="btn btn-danger rounded btn-sm"
                                                                onclick="deleteCategory('{{ \App\Helpers\Helpers::encode($category->id) }}')">
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
                                    <h5>{{__('No Categories found')}}</h5>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">
                        {{__('Add New Category')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="addCategory">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('Category')}}</label>
                            <input type="text" class="form-control" name="name" placeholder="{{__('Category Name')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{__('Description')}}</label>
                            <textarea class="form-control" name="description" placeholder="{{__('Category Description')}}"></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button id="addCategory" type="submit" class="btn btn-primary w-50">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">
                        {{__('Edit Category')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="updateCategory">
                        <input type="text" id="category_id" name="category_id" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('Category')}}</label>
                            <input type="text" id="categoryName" class="form-control" name="name" placeholder="{{__('Category Name')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{__('Description')}}</label>
                            <textarea class="form-control" id="categoryDescription" name="description" placeholder="{{__('Category Description')}}"></textarea>
                        </div>
                        <div class="text-center">
                            <button id="updateCategory" type="submit" class="btn btn-primary w-50">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection