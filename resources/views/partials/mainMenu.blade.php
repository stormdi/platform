@isset($title)
    <li class="list-inline-item nav-item mt-3">
        <div class="hidden-folded padder mt-1 mb-1 text-muted text-xs m-l">{{ __($title) }}</div>
    </li>
@endisset

<li class="list-inline-item dropdown nav-item @isset($active) {{active($active)}} @endisset">
    <a class="nav-link"
       @if (!empty($childs))
       data-toggle="dropdown"
       @else
       href="{{$route ?? '#'}}"
        @endif
    >
        @isset($badge)
            <b class="badge bg-{{$badge['class']}} pull-right mr-3 mt-1">{{$badge['data']()}}</b>
        @endisset
        <i class="{{$icon}} mr-2"></i>{{ __($label) }}
    </a>

    @if($childs)
        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow bg-white">
            {!! Dashboard::menu()->render($slug,'platform::partials.dropdownMenu') !!}
        </div>
    @endif
</li>



@if($divider)
    <li class="divider my-2"></li>
@endif
