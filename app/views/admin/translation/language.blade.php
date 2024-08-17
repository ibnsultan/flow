@extends('layouts.admin')	
@section('content')

	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($languageData))
                                @include('admin.translation.tables.translations')
                            @else
                                @include('layouts.admin.empty')
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

        $(document).ready(function() {

            injectStylesheet('https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css');

            let table = new DataTable('#row-callback', {
                paging: true,
                searching: true,
                info: true,
                lengthChange: true,
                pageLength: 100,
                lengthMenu: [100, 250, 500, 1000],
                order: [[0, 'asc']],
                language: {
                    search: '{{__('Search')}} &nbsp;',
                    lengthMenu: '{{__('Show')}} &nbsp; _MENU_',
                    info: '{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}',
                    infoEmpty: '{{__('No entries found')}}',
                    zeroRecords: '{{__('No matching records found')}}',
                    infoFiltered: '{{__('filtered from')}} _MAX_ {{__('total entries')}}',
                    paginate: {
                        first: '{{__('First')}}',
                        last: '{{__('Last')}}',
                        next: '{{__('Next')}}',
                        previous: '{{__('Previous')}}'
                    }
                }
            });

        });

        $(document).on('blur', '.translation-phrase', function() {
            let id = $(this).data('translation-id');
            let key = $(this).data('translation-key');
            let value = $(this).text();

            $.ajax({
                url: "{{ route('language.update') }}",
                type: 'POST',
                data: {
                    id: id,
                    key: key,
                    value: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.status) {
                        toast.success({ message:response.message, position: 'bottomCenter' });
                    } else {
                        toastr.error({ message:response.message, position: 'bottomCenter' });
                    }
                },
                error: function() {
                    toastr.error({ message:"{{ __('An error occurred. Please try again.') }}", position: 'bottomCenter' });
                }
            });
        });

    </script>
@endsection 