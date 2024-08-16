<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>{{__('Title')}}</th>
                <th>{{__('Description')}}</th>
                <th>{{__('Issued')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
                <tr id="announcement-{{$announcement->id}}">
                    <td>{{ $announcement->title }}</td>
                    <td class="w-50">
                        <span>{{ $announcement->description }}</span>
                    </td>
                    <td>{{ $announcement->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-danger rounded" onclick="deleteAnnouncement({{$announcement->id}})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>