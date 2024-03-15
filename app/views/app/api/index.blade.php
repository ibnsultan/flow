@extends('layouts.app')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header position-relative">
                            <h5>Api Keys Management</h5>
                            <!-- generate api key and send response to function apiKey_created(response) -->
                            <button class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" 
                                 data-bs-toggle="modal" data-bs-target="#createApiKey">
                                Create Key
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="apiTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Key</th>
                                            <th>Created At</th>
                                            <th>Last Used</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($apiKeys as $key)
                                            <tr>
                                                <td>{{ $key->name }}</td>
                                                <td>{{ \App\Helpers\Helpers::previewKey($key->token) }}</td>
                                                <td>{{ $key->created_at->diffForHumans() }}</td>
                                                <td>{{ $key->updated_at->diffForHumans() }}</td>
                                                <td class="text-center">
                                                    <a href="/app/api/activity/{{ \App\Helpers\Helpers::encode($key->id)}}" class="btn-primary btn btn-sm rounded-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a> &nbsp;

                                                    <a href="javascript:void(0)" class="btn-danger btn btn-sm rounded-1" 
                                                        onclick="deleteApiKey('{{ \App\Helpers\Helpers::encode($key->id)}}')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- create model -->
    <div class="modal fade" id="createApiKey" tabindex="-1" role="dialog" aria-labelledby="createApiKeyLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createApiKeyLabel">Create API Key</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="createApiKey" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="api_name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="secret">Secret Key</label>
                            <input type="text" class="form-control" name="api_secret" placeholder="Enter a passkey" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary w-50">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>

        $("form[name='createApiKey']").submit(function(event) {

            event.preventDefault();

            $.ajax({
				url: '/app/api/create',
				type: 'POST',
				data: $(this).serialize(),
				success: function(response) {
					if(response.status == 'success') {
						Swal.fire({ icon: 'success', title: 'Your token is', text: response.message }).then(() => {
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

        })

    </script>
@endsection