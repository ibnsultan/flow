@foreach($notifications::user_list(auth()->id())->get() as $notification)
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="{{ $notification->avatar }}" alt="user-image" class="user-avtar wid-35" style="aspect-ration:1/1"/>
                </div>
                <div class="flex-grow-1 ms-3">
                    <span class="float-end text-sm text-muted">{{ $notification->created_at->diffForHumans() }}</span>
                    <h5 class="text-body mb-2">{{ $notification->title }}</h5>
                    <p class="mb-0">{{ $notification->message }} </p>
                </div>
            </div>
        </div>
    </div>
@endforeach