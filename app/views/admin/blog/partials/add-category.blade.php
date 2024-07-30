@if($addCategoryPermission->status)
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">
                        {{ __('Add New Category') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="addCategory">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Category') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="{{ __('Category Name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control" name="description" placeholder="{{ __('Category Description') }}"></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button id="addCategory" type="submit" class="btn btn-primary w-50">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif