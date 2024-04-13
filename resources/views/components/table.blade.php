<div>
    <div class="{{ $table->getTableClass() }}">
        <div class="rocket-table-header">
            <div class="container-fluid">
                <div class="row">
                    @foreach($table->getHeaders() as $header)
                        <div class="{{ $header->class }}">
                            <div class="details">
                                <span class="label">{{ $header->label }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="rocket-table-body">
            @foreach($table->getRows() as $row)
                <div class="container-fluid">
                    <div class="row">
                        @foreach($row as $cell)
                            <div class="{{ $cell->colClass }}">
                                @switch($cell->type)

                                    @case('text')
                                        @include('rocket::components.table.cells.text', ['cell' => $cell])
                                        @break
                                    @case('button')
                                        @include('rocket::components.table.cells.button', ['cell' => $cell])
                                        @break
                                    @case('action')
                                        @include('rocket::components.table.cells.icon', ['cell' => $cell])
                                        @break
                                @endswitch


                                {{--@if($element->isButton)
                                    @if($element->link != '')
                                        <div class="option">
                                            @switch($element->typeButton)
                                                @case('text')
                                                    <a href="{{ $element->link }}" target="{{ $element->target }}">
                                                        <div class="{{ $element->classButton }}">
                                                            <span class="dss"> {{ $element->value }}</span>
                                                        </div>
                                                    </a>
                                                    @break

                                                @case('drop')
                                                    @break

                                                @default
                                                    <a href="{{ $element->link }}" target="{{ $element->target }}">
                                                        <div class="{{ $element->classButton }}">
                                                            <i class="{{ $element->icon }}"></i>
                                                        </div>
                                                    </a>
                                            @endswitch
                                        </div>
                                    @endif
                                @else
                                    <div class="details">
                                        <span class="label">{{ $element->label }}</span>
                                        <span class="separator"></span>
                                        <div class="value">
                                                <span class="{{ $element->valueClass }}">
                                                    {{ $element->value }}
                                                </span>
                                            @if($element->subTitle != '')
                                                <span class="{{ $element->subTitleClass }}">
                                                        {{ $element->subTitle }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif--}}


                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>