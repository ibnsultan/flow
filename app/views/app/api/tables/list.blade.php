<div class="table table-responsive">
    <table id="apiTable" class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Last Used</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($apiKeys as $key)
                <tr>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->created_at->diffForHumans() }}</td>
                    <td>
                        @if($key->created_at == $key->updated_at)
                            <span class="badge bg-warning">Never Used</span>
                        @else
                            {{ $key->updated_at->diffForHumans() }}
                        @endif
                    </td>
                    <td class="text-end">

                        <a href="/app/api/activity/{{ $helpers::encode($key->id)}}" class="btn-primary btn btn-sm rounded-1">
                            <i class="fa fa-eye"></i>
                        </a>

                        <!-- refresh key -->
                        <a href="javascript:void(0)" class="btn-warning btn btn-sm rounded-1" 
                            onclick="refreshApiKey  ('{{ $helpers::encode($key->id)}}')">
                            <i class="fa fa-sync"></i>
                        </a>

                        <a href="javascript:void(0)" class="btn-danger btn btn-sm rounded-1" 
                            onclick="deleteApiKey('{{ $helpers::encode($key->id)}}')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>