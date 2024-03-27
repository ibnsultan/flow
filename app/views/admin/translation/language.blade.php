@extends('layouts.admin')	
@section('content')

	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-4 position-relative">
                            <h5>
                                {{_('Translations')}}: {{ $language->name }}
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
                                                <th>{{_('Key')}}</th>
                                                <th>{{_('Translation')}}</th>
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
                                    {{_('No translations found for this language.')}}
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
                    search: '{{_('Search')}}',
                    lengthMenu: '{{_('Show')}} _MENU_ {{_('entries')}}',
                    info: '{{_('Showing')}} _START_ {{_('to')}} _END_ {{_('of')}} _TOTAL_ {{_('entries')}}',
                    infoEmpty: '{{_('No entries found')}}',
                    zeroRecords: '{{_('No matching records found')}}',
                    infoFiltered: '{{_('filtered from')}} _MAX_ {{_('total entries')}}',
                    paginate: {
                        first: '{{_('First')}}',
                        last: '{{_('Last')}}',
                        next: '{{_('Next')}}',
                        previous: '{{_('Previous')}}'
                    }
                }
            });

        });
    </script>
@endsection