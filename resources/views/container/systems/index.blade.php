@extends('platform::layouts.dashboard')

@section('title',trans('platform::systems/settings.title'))
@section('description', trans('platform::systems/settings.description'))
@section('controller','layouts--systems')

@section('navbar')
    <div class="pull-right">
        <div class="input-group  w-xxl">
            <input
                    data-action="keyup->layouts--systems#filter"
                    type="text" class="form-control input-sm bg-light no-border rounded padder"
                    placeholder="{{trans('platform::systems/settings.search')}}">
        </div>
    </div>
@stop

@section('aside')

    @foreach($settings as $key => $value)
        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>{{trans('platform::systems/settings.app.'.$key)}}</span>
        </li>

        <li class="padder text-ellipsis text-white">
            <span class="m-l"> - {{$settings->get($key) }}</span>
        </li>
    @endforeach

    <li class="divider b-t m-t-sm b-dark"></li>

@endsection


@section('content')
<div class="bg-white">

    <div class="admin-wrapper container wrapper-md">
        <div class="row">
             @foreach(Dashboard::menu()->build('Systems')->chunk(2) as $items)
                 <div class="col-md-5 col-md-4 admin-element-item">

                    @foreach($items as $item)
                            @include('platform::partials.systems.systemsMenu', [
                                'icon' => $item['icon'],
                                'label' => $item['label'],
                                'children' => $item['children'],
                            ])
                     @endforeach

                 </div>
             @endforeach
        </div>
    </div>

</div>

@stop