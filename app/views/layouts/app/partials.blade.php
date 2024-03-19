<div class="offcanvas pc-announcement-offcanvas offcanvas-end" tabindex="-1" id="announcement" aria-labelledby="announcementLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="announcementLabel"> {{_('What\'s New')}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        @php $announcements = (new App\Models\Announcement)->group(auth()->user()['role']); @endphp
        @if(count($announcements))

            @foreach($announcements as $announcement)
                <div class="card mb-3" style="max-height: 350px; overflow-y: auto;">
                    <div class="card-body">
                        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
                            <p class="mb-0 text-muted">{{ $announcement->updated_at->diffForHumans() }}</p>
                            <span class="badge dot bg-light"></span>
                        </div>
                        <h5 class="mb-3">{{ $announcement->title }}</h5>

                        @if($announcement->image != '')
                            <img src="{{ $announcement->image }}" alt="img" class="img-fluid mb-3" />
                        @endif

                        <p class="text-muted">{{ $announcement->description }}</p>

                        @if($announcement->link != '')
                        <div class="row">
                            <div class="col-12">
                                <div class="d-grid">
                                <a class="btn btn-outline-secondary" href="{{ $announcement->link }}" target="_blank" >Check Now</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach

        @else
            <div class="alert alert-warning" role="alert">
                {{_('No new announcements')}}
            </div>            
        @endif

    </div>
</div>