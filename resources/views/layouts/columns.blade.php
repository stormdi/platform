<div class="hbox hbox-auto-xs py-3">
    @foreach($manyForms as $key => $column)
        <div class="hbox-col">
            <div class="vbox
                @if ($loop->first) pl-0 @else pl-4 @endif
            @if ($loop->last) pr-0 @else pr-4 @endif">

                @foreach($column as $item)
                    {!! $item ?? '' !!}
                @endforeach
            </div>
        </div>
    @endforeach
</div>
