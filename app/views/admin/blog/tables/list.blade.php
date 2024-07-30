<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="w-50">{{__('Title')}}</th>
                <th>{{__('Author')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Published')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>
                        <a href="/admin/blog/article/edit/{{ $helpers::encode($article->id) }}">
                            {{ $article->title }}
                        </a>
                    </td>
                    <td>{{ $article->user->fullname }}</td>
                    <td>{{ $article->blog_category->name }}</td>
                    <td>{{ $article->created_at->diffForHumans() }}</td>
                    <td class="text-end">

                        <!-- Edit the article -->
                        @if($editArticlePermission->status)
                            @if($handler::owns($editArticlePermission->scope, (auth()->id() === $article->author)))
                                <a href="/admin/blog/article/edit/{{ $helpers::encode($article->id) }}" class="btn btn-primary rounded btn-sm">
                                    <i class="ti ti-pencil"></i>
                                </a>
                            @endif  
                        @endif

                        <!-- Delete the article -->
                        @if($deleteArticlePermission->status)
                            @if($handler::owns($deleteArticlePermission->scope, (auth()->id() === $article->author)))
                                <button class="btn btn-danger rounded btn-sm"
                                    onclick="deleteArticle('{{ $helpers::encode($article->id) }}')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            @endif
                        @endif
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>