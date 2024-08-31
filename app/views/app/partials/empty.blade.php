<div class="d-grid h-100 align-items-center justify-content-center" style="min-height: 150px;">
    <div class="d-grid align-items-center justify-content-center">
        <div class="text-center empty-icon">
            {!! (isset($emptyIcon)) ? null : '<i class="ph-duotone ph-sparkle mb-2" style="font-size:4rem"></i>' !!}
            <h2>{{ $emptyTitle ?? null }}</h2>
            <p>{{ $emptyText ?? __('No records found') }}</p>
        </div>
    </div>
</div>