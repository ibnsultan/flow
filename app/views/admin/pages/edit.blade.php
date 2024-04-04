@extends('layouts.admin')	
@section('content')   

    <div class="pc-container">
        <div class="pc-content">
            
            <form action="post" enctype="multipart/form-data" name="updatePage">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="card h-100">
                            <input type="hidden" id="pageId" name="id" value="{{ $helper::encode($page->id) }}">
                            <div class="card-body editor-board">

                                <textarea name="content" id="classic-editor" required hidden> {!! $page->content !!} </textarea>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <select name="status" class="form-select" required>
                                        <option value="live">{{_('Published')}}</option>
                                        <option value="draft">{{_('Draft')}}</option>
                                    </select>
                                </div>

                                <div class="form-group">                                    
                                    <label class="form-label">{{_('Page Title')}}</label>
                                    <input type="text" class="form-control" name="title" placeholder="Article Title ..." value="{{$page->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{_('URL Slug')}}</label>
                                    <input type="text" name="slug" placeholder="url slug" class="form-control" value="{{$page->slug}}" pattern="^[a-zA-Z0-9_-]+$" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{_('Meta Keywords')}}</label>
                                    <input type="text" name="meta_keywords" placeholder="Meta Keywords, comma separated" value="{{$page->meta_keywords}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{_('Meta Description')}}</label>
                                    <textarea name="meta_description" class="form-control" placeholder="Meta Description" value="{{$page->meta_description}}" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100 rounded">{{_('PUBLISH PAGE')}}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
                

        </div>
    </div>

@endsection