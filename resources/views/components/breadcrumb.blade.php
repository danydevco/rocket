<div class="page-header d-flex justify-content-between align-items-center">
    <div class="page-block w-auto">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb mb-0">
                    @foreach($breadcrumbs as $breadcrumb)
                        @if($loop->last)
                            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
                        @else
                            <li class="breadcrumb-item">
                                {{--<a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>--}}
                                {{ $breadcrumb['name'] }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ $title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{ $slot }}
    </div>
</div>
