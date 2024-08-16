<div class="modal fade" id="addNewAnnouncement" tabindex="-1" aria-labelledby="addNewAnnouncementLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewAnnouncementLabel">
                    {{__('Add New Announcement')}}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddAnnouncement" name="addAnnouncement" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{__('Title')}}</label>
                        <sup class="text-danger">*</sup>
                        <input type="text" name="title" class="form-control" placeholder="announcement title" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Description')}}</label>
                        <sup class="text-danger">*</sup>
                        <textarea name="description" class="form-control" rows="3" placeholder="announcement content" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Link')}}</label>
                        <input type="text" name="link" class="form-control" placeholder="announcement link">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Recipients')}}</label>
                        <sup class="text-danger">*</sup>
                        <select name="recipients[]" class="form-control form-select" multiple required
                            data-live-search="true" data-size="8">
                            <option value="">Select Target audience</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!--div class="form-group user-upload rounded w-100">
                        <img src="/assets/images/placeholder.jpg" alt="Image Placeholder" id="imagePreview" class="w-100">
                        <label for="cover" id="coverUpload" class="img-avtar-upload" >
                            <i class="ti ti-camera f-24 mb-1"></i>
                            <span>Upload</span>
                        </label>
                        <input type="file" id="cover" name="cover" class="d-none" accept="image/*" 
                            onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                    </div-->

                    <div class="form-group">
                        <button id="btnAddAnnouncement" type="submit" class="btn btn-primary w-100 rounded">{{__('Publish')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 