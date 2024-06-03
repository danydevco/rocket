<div class="dropdown">
    <a class="btn btn-light-primary avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
       href="#"
       data-bs-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        <i class="ti ti-dots-vertical f-18"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        @foreach($links as $link)
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#detail-{{ $link->route }}">{{ $link->text }}</a>
        @endforeach
    </div>
</div>