@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header position-relative">
                            <h5>
                                {{_('Pages')}}
                            </h5>
                            <a class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" href="/admin/pages/add">
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

                            @if(count($pages))

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{_('Title')}}</th>
                                                <th>{{_('Short')}}</th>
                                                <th class="text-center">{{_('Status')}}</th>
                                                <th class="text-end">{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($pages as $page)
                                                <tr>
                                                    <td>{{ $page->title }}</td>
                                                    <td>{{ substr(strip_tags(html_entity_decode($page->content)), 0, 100) }}</td>
                                                    <td class="text-center">
                                                        @if($page->status == 'live')
                                                            <span class="badge bg-success"> {{_('Published')}} </span>
                                                        @else
                                                            <span class="badge bg-danger"> {{_('Draft')}} </span>
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
                                    {{_('No pages found.')}}
                                </div>
                            
                            @endif

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

    <script>
        function deletePage(id) {
            Swal.fire(
                {
                    title: '{{_("Are you sure?")}}',
                    text: '{!! _("You won\'t be able to revert this!") !!}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{_("Yes, delete it!")}}'
                }
            )
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/pages/delete/' + id,
                        type: 'get',
                        success: function(response) {
                            if(response.status == 'success') {
                                Swal.fire( 'Success!', response.message, 'success' ).then((result) => {
                                    location.reload();
                                });
                            }else{
                                Swal.fire( 'Error!', response.message, 'error' );
                            }
                        }
                    });
                }
            });
        }
    </script>

@endsection