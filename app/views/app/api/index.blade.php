@extends('layouts.app')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-xl-10 col-md-8 col-sm-7">
                    <div class="card">
                        <input class="form-control w-100" id="searchApi" placeholder="Search API Key"/>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-5">
                    <button class="btn btn-primary w-100 mt-1" data-bs-toggle="modal" data-bs-target="#createApiKey">
                        {{ __('Create API Key') }}
                    </button>
                </div>
            </div>

            <div class="alert alert-success text-truncate d-none p-3" role="alert">
                <span id="holderApiToken"></span>
                <span id="copyApiToken" class="btn bg-light text-truncate position-absolute m-2 top-0 end-10">
                    <i class="fa fa-copy"></i>
                </span>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($apiKeys->count())
                                @include('app.api.tables.list')
                            @else
                                @include('layouts.app.empty')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('app.api.forms.issue')

@endsection
@push('scripts')
    <script>

        $("#formCreateApiKey").submit(function(event) {

            event.preventDefault();
            buttonState('#btnCreateApiKey', 'loading');

            $.ajax({
				url: "{{ route('api.create') }}",
				type: 'POST',
				data: $(this).serialize(),
				success: function(response) {
					if(response.status == 'success') {

                        $('#createApiKey').modal('hide');
                        $('#formCreateApiKey').trigger('reset');

                        $('#holderApiToken').text(response.token);
                        $('.alert').removeClass('d-none');
                        $('#copyApiToken').click();

                        setTimeout(() => {
                            location.reload();
                        }, 3000);

					} else {
                        toast.error({ message: response.message, position: 'bottomCenter' });
					}
				},
				error: function() {
                    toast.error({ message: "{{ __('An error occurred. Please try again later.') }}", position: 'bottomCenter' });
				},
                complete: function() {
                    buttonState('#btnCreateApiKey', 'reset', "{{ __('Issue Key') }}");
                }
			});

        })

        function deleteApiKey(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: ("{{ route('api.delete', ':id') }}").replace(':id', id) + '?_token={{ csrf_token() }}',
                        type: 'DELETE',
                        success: function(response) {
                            if(response.status == 'success') {
                                Swal.fire({ icon: 'success', title: 'Deleted!', text: response.message }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({ icon: 'error', title: 'Oops...', text: response.message })
                            }
                        },
                        error: function() {
                            Swal.fire({ icon: 'error', title: 'Oops...', text: 'An error occurred. Please try again later.' });
                        }
                    });
                }
            })
        }

        function refreshApiKey(id){
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to refresh the API Key. This will invalidate the current key and generate a new one.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, refresh it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('api.refresh') }}",
                        type: 'POST',
                        data: {
                            apiId : id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if(response.status == 'success') {
                                $('#holderApiToken').text(response.token);
                                $('.alert').removeClass('d-none');
                                $('#copyApiToken').click();
                            } else {
                                Swal.fire({ icon: 'error', title: 'Oops...', text: response.message })
                            }
                        },
                        error: function() {
                            Swal.fire({ icon: 'error', title: 'Oops...', text: 'An error occurred. Please try again later.' });
                        }
                    });
                }
            })
        }

        $('#searchApi').on('keyup', function() {
            let value = $(this).val().toLowerCase();
            $('#apiTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('#copyApiToken').click(function() {
            copyToClipboard($('#holderApiToken').text());
            toast.success({ message: "{{ __('API Copied to clipboard.') }}", position: 'bottomCenter' });
        });

    </script>
@endpush