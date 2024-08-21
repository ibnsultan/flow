<div class="modal fade" id="createApiKey" tabindex="-1" role="dialog" aria-labelledby="createApiKeyLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createApiKeyLabel">{{ __('Create API Key') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCreateApiKey" name="createApiKey" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Identity') }}</label>
                        <input type="text" class="form-control" name="api_name" placeholder="{{ __('Enter Indentity name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="secret">{{ __('Passphrase') }}</label>
                        <input type="password" class="form-control" name="api_secret" placeholder="{{ __('Enter Api passphrase') }}" required>
                    </div>
                    <div class="form-group text-center">
                        <button id="btnCreateApiKey" type="submit" class="btn btn-primary w-50">{{ __('Issue Key') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>