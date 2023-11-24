@props(['title' => null, 'column' => 'col-12'])
<div class="row">
    <div class="{{ $column }}">
        <div class="card">
            @if ($title != null || !isset($header))
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title fw-semibold">{{ ucwords($title) }}</h4>
                        <div>
                            {{ $header ?? '' }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-body p-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
