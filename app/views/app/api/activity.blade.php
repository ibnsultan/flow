@extends('layouts.app')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 position-relative">
                            <h5>
                                <span class="text-primary">{{$apiKey->name}}</span>
                            </h5>
                            <button class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" 
                                data-bs-toggle="modal" data-bs-target="#copyApiKey">
                                {{ __('Copy Key') }}
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
                                @include('app.api.tables.activity')
                            @else
                                @include('layouts.app.empty')
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('app.api.forms.preview')
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
                        toast.error({ message: response.message, position: 'bottomCenter' });
                    }
                },
                error: function() {
                    toast.error({ message: "{{ __('An error occurred. Please try again.') }}", position: 'bottomCenter' });
                }
            });
        });

        function copyKey() {
            var keyPreview = document.getElementById('keyPreview');
            keyPreview.select();
            document.execCommand('copy');

            // if not empty
            if(keyPreview.value){  
                toast.success({ message: "{{ __('Key copied to clipboard') }}", position: 'bottomCenter' });
                return;
            }

            toast.error({ message: "{{ __('Key could not be copied') }}", position: 'bottomCenter' });
            
        }
    </script>
@endpush