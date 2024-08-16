@extends('layouts.app')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header position-relative">
                            <h5>
                                API Activity/History: &nbsp;
                                <span class="text-primary">{{$apiKey->name}}</span>
                            </h5>
                            <button class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" 
                                 data-bs-toggle="modal" data-bs-target="#copyApiKey">
                                Get Key
                            </button>             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($activities) > 0)
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{__('Handler')}}</th>
                                                <th>{{__('Origin')}}</th>
                                                <th class="w-25">{{__('Payload')}}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($activities as $activity)
                                                <tr>
                                                    <td style="font-size: 10px;">
                                                        {!! ($activity->status == 'pass') ? 
                                                            '<span class="badge bg-success">pass</span>' : 
                                                            '<span class="badge bg-danger">fail</span>' 
                                                        !!}
                                                    </td>
                                                    <td>{{$activity->handler}}</td>
                                                    <td>{{$activity->origin}}</td>
                                                    <td><code>{{ json_encode($activity->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)}}<code></td>
                                                    <td class="text-end">{{$activity->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center">
                                    No activity recorded for this API key
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="modal fade" id="copyApiKey" tabindex="-1" aria-labelledby="copyApiKeyLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form name="copyApiKeyForm" method='post'>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="copyApiKeyLabel">Copy API Key</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mb-1">Secret Key</label>
                            <input type="password" class="form-control" name="api_secret" placeholder="Enter the API secret key" required>
                            <input type="text" name="api_id" value="{{$apiID}}" hidden>
                        </div>

                        <div class="form-group position-relative">
                            <textarea id="keyPreview" class="form-control" rows="4" onclick="copyKey()" readonly>{{ \App\Helpers\Helpers::previewKey($apiKey->token) }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type='submit' class="btn btn-primary">Get API Key</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("form[name='copyApiKeyForm']").submit(function(event) {
            event.preventDefault();
            
            $.ajax({
                url: '/app/api/copy',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if(response.status == 'success') {
                        
                        var key = response.message;
                        
                        $('#keyPreview').val(key)
                        copyKey();
                        
                    } else {
                        Swal.fire({ icon: 'error', title: 'Oops...', text: response.message })
                    }
                },
                error: function() {
                    Swal.fire({ icon: 'error', title: 'Oops...', text: 'An error occurred while processing your request' })
                }
            });
        });

        function copyKey() {
            var keyPreview = document.getElementById('keyPreview');
            keyPreview.select();
            document.execCommand('copy');

            
            Swal.fire({ icon: 'success', title: 'Success', text: 'API key copied to clipboard' })
        }
    </script>
@endpush