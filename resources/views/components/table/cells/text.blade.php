<div class="details">
    <span class="label">{{ $cell->label }}</span>
    <span class="separator"></span>
    <div class="value">
        <span class="{{ $cell->titleClass }}">
            {{ $cell->title }}
        </span>
        @if($cell->subtitle != '')
            <span class="{{ $cell->subtitleClass }}">
                {{ $cell->subtitle }}
            </span>
        @endif
    </div>
</div>