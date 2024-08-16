<form name="addNewRolePermission" id="formAddRolePermission" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label"> {{__('Permission Name')}} </label>
                <input type="text" name="permission" class="form-control" placeholder="modify_user_permissions" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label"> {{__('Description')}} </label>
                <textarea name="description" class="form-control" placeholder="Allow User Role Modifification" rows="2"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label"> {{__('Module')}} </label>
                <select name="module" class="form-select" required>
                    <option value=""> {{__('Select Module')}} </option>
                    @foreach ($appModules as $module)
                        <option value="{{$module->id}}"> {{ ucfirst($module->name) }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label"> {{__('Scopes')}} </label> <br>
                <!-- inline checkboxes: all, added, owned, both, none -->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="all" name="permissions[]" checked hidden>
                    <input class="form-check-input" type="checkbox" value="all" name="permissions[]" checked disabled>
                    <label class="form-check-label" for="inlineCheckbox1"> {{__('All')}} </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="owned" name="permissions[]">
                    <label class="form-check-label" for="inlineCheckbox2"> {{__('Owned')}} </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="added" name="permissions[]">
                    <label class="form-check-label" for="inlineCheckbox3"> {{__('Added')}} </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="both" name="permissions[]">
                    <label class="form-check-label" for="inlineCheckbox2"> {{__('Both')}} </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="none" name="permissions[]" checked hidden>
                    <input class="form-check-input" type="checkbox" value="none" name="permissions[]" checked disabled>
                    <label class="form-check-label" for="inlineCheckbox3"> {{__('None')}} </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <button id='btnAddPermission' type="submit" class="btn btn-primary w-100"> {{__('Save')}} </button>
            </div>
        </div>
    </div>
</form>