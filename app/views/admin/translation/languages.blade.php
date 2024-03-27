@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-4 position-relative">
                            <h5>
                                {{_('Languages & Translations')}}
                            </h5>
                            <input class="form-control w-25 position-absolute" 
                                style="top:0.8rem;right:2rem;" id="languageSearch" placeholder="{{_('Search Language')}}"/>
             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($languages))

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{_('Language')}}</th>
                                                <th class="text-center">{{_('Code')}}</th>
                                                <th class="text-center">{{_('Layout')}}</th>
                                                <th class="text-center">{{_('Status')}}</th>
                                                <th class="text-end">{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($languages as $language)
                                                <tr>
                                                    <td>{{ $language->name }}</td>
                                                    <td class="text-center">{{ strtoupper($language->iso) }}</td>
                                                    <td class="text-center">{{ strtoupper($language->layout) }}</td>
                                                    <td class="text-center">
                                                        @if($language->status == 'active')
                                                            <span class="badge bg-success">{{_('Active')}}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{_('Inactive')}}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="/admin/translation/language/{{ \App\Helpers\Helpers::encode($language->id) }}" 
                                                            class="btn btn-primary rounded btn-sm">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <!-- options modal -->
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-secondary rounded btn-sm" 
                                                                data-bs-toggle="modal" data-bs-target="languageOptions" data-id="{{ $language->id }}">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="text-center">
                                    {{_('No languages found')}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    <!-- language options modal -->
    <div class="modal fade" id="languageOptions" tabindex="-1" aria-labelledby="languageOptionsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="languageOptionsLabel">{{_('Language Options')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
    
        // on search
        $('#languageSearch').on('keyup', function() {
            let search = $(this).val().toLowerCase();
            $('table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1)
            });
        });

        // on language options modal
        $('#languageOptions').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);

            $.ajax({
                url: '/admin/translation/language/' + id,
                method: 'get',
                success: function(response) {
                    modal.find('.modal-body').html(response);
                }
            });
        });

    </script>

@endsection