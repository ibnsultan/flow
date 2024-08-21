<div class="table table-responsive">
    <table id="apiTable" class="table table-hover" style="width:100%">
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