<form method="post" id="formAddUserRole">
    <!-- role name -->
    <div class="form-group">
        <label for="name" class="form-label">{{__('Role Name')}}</label>
        <input type="text" name="name" class="form-control" placeholder="admin" required>
    </div>

    <!-- role description -->
    <div class="form-group">
        <label for="description" class="form-label">{{__('Description')}}</label>
        <input type="text" name="description" class="form-control" placeholder="Administrator" required>
    </div>

    <!-- role: clone permissions -->
    <div class="form-group">
        <label for="clone" class="form-label">{{__('Clone Permissions')}}</label>
        <select name="clone" class="form-select">
            <option value="">{{__('Select Role')}}</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}"> {{ $role->description }} </option>
            @endforeach
        </select>
    </div>

    <!-- submit -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary w-100" id="btnAddUserRole">{{__('Create Role')}}</button>
    </div>
</form>