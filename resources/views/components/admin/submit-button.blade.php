@props(['text' => 'Submit'])

<button {{ $attributes->merge(['class' => 'btn btn-primary me-sm-3 me-1', 'id' => '', 'type' => 'submit', 'data-text' => $text]) }}>
    <span class="spinner-border spinner-border-sm d-none me-1" id="submit-spinner" role="status" aria-hidden="true"></span>
    <span id="btn--text">{{ $text }}</span>
</button>
