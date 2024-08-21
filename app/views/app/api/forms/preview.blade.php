<div class="modal fade" id="copyApiKey" tabindex="-1" aria-labelledby="copyApiKeyLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form name="copyApiKeyForm" method='post'>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="copyApiKeyLabel">{{ __('Copy API Key') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="password" class="form-control" name="api_secret" placeholder="Enter the API passphrase" required>
                        <input type="text" name="api_id" value="{{$apiID}}" hidden>
                    </div>

                    <div class="form-group position-relative">
                        <textarea id="keyPreview" class="form-control" rows="4" onclick="copyKey()" readonly placeholder="{{ $helpers::previewKey($apiKey->token) }}"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type='submit' class="btn btn-primary">{{ __('Get API Key') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>