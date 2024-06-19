@extends('layouts.admin')	
@section('content')

	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-4 position-relative">
                            <h5>
                                {{__('Translations')}}: {{ $language->name }}
                            </h5>             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($languageData))

                                <div class="table-responsive dt-responsive">
                                    <table id="row-callback" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{__('Key')}}</th>
                                                <th>{{__('Translation')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($languageData as $key => $value)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td contenteditable>{{ $value }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="text-center">
                                    {{__('No translations found for this language.')}}
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
    </script>
@endsection 