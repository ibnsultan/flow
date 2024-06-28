<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="w-25">{{ __('Module') }}</th>
                <th class="text-center">{{ __('Create') }}</th>
                <th class="text-center">{{ __('Read') }}</th>
                <th class="text-center">{{ __('Update') }}</th>
                <th class="text-center">{{ __('Delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modulesPermissions as $module => $permissions)            
                <tr>
                    <td rowspan="2">{{ ucfirst($module) }}</td>
                    @if(count($permissions['primary']))
                        @foreach (['create', 'read', 'update', 'delete'] as $permision)
                            <td class="text-center">
                                @if(!isset($permissions['primary'][$permision])) - @continue @endif
                                <select class="permision-selector" 
                                    data-module="{{$module}}" data-permission="{{$permision}}" data-role="{{$helpers::encode($role)}}">
                                    {!!
                                        (isset($rolePermissions[$module][$permision])) ? 
                                            "<option value='{$rolePermissions[$module][$permision]}'>
                                                {$rolePermissions[$module][$permision]}
                                            </option>" :
                                            "<option value='' hidden>". __('None') ."</option>"
                                    !!}
                                    @foreach ($permissions['primary'][$permision] as $scope)
                                        <option value="{{$scope}}">{{$scope}}</option>
                                    @endforeach
                                </select>
                            </td>
                        @endforeach
                    @else
                        <td colspan="4" class="text-center">{{ __('No Primary Permissions') }}</td>
                    @endif
                </tr>
                <tr>
                    @if(count($permissions['secondary']))
                        <td colspan="4">
                            @foreach ($permissions['secondary'] as $permision => $scopes)
                                <ul style="list-style:none" class="mt-2">
                                    <li class="position-relative">
                                        <span>{{ucfirst(str_replace('_', ' ', __($permision) ))}}</span>

                                        <select class="permision-selector position-absolute end-20" 
                                            data-module="{{$module}}" data-permission="{{$permision}}" data-role="{{$helpers::encode($role)}}">
                                            {!!
                                                (isset($rolePermissions[$module][$permision])) ?
                                                    "<option value='{$rolePermissions[$module][$permision]}'>
                                                        {$rolePermissions[$module][$permision]}
                                                    </option>" :
                                                    "<option value='' hidden>". __('None') ."</option>"
                                            !!}
                                            @foreach ($scopes as $scope)
                                                <option value="{{$scope}}">{{$scope}}</option>
                                            @endforeach
                                        </select>

                                    </li>
                                </ul>
                            @endforeach
                        </td>
                    @else
                        <td colspan="4" class="text-center">{{ __('No Secondary Permissions') }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>

    // onchange event for permision-selector
    $('.permision-selector').on('change', function() {
        
        let value = $(this).val();
        let role = $(this).data('role');
        let feature = $(this).data('module');
        let permission = $(this).data('permission');

        $.ajax({
            url: '/admin/access/roles/permissions/update',
            type: 'POST',
            data: {
                role: role,
                value: value,
                module: feature,
                permission: permission
            },
            success: function(response) {
                if(response.status == 'success') {
                    iziToast.success({
                        message: response.message,
                        position: 'bottomCenter'
                    });
                } else {
                    iziToast.error({
                        message: response.message,
                        position: 'bottomCenter'
                    });
                }
            }
        });

    });

</script>