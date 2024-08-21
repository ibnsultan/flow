<div class="table table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>{{__('Handler')}}</th>
                <th>{{__('Origin')}}</th>
                <th class="w-25">{{__('Payload')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td style="font-size: 10px;">
                        {!! ($activity->status == 'pass') ? 
                            '<span class="badge bg-success">pass</span>' : 
                            '<span class="badge bg-danger">fail</span>' 
                        !!}
                    </td>
                    <td>{{$activity->handler}}</td>
                    <td>{{$activity->origin}}</td>
                    <td><code>{{ json_encode($activity->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)}}<code></td>
                    <td class="text-end">{{$activity->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>