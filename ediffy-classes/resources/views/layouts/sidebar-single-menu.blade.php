@if(!empty($roleMenu))
    @foreach($roleMenu as $menu)
        <li class="treeview">
            <a href="{{ ($menu['is_parent'])?'#':route($menu['route']) }}">
                <i class="fa fa-{{$menu['icon']}}"></i>
                <span>{{ $menu['name'] }}</span>
                @if($menu['is_parent'])
                    <i class="fa fa-angle-right pull-right"></i>
                @endif
    </a>
    {{--if is parent true--}}
    @if($menu['is_parent'])
        <ul class="treeview-menu">
            @foreach($menu['child'] as $submenu)
                <li><a href="{{route($submenu['route'])}}"><i class="fa fa-{{$submenu['icon']}}"></i>{{$submenu['name']}}</a></li>
            @endforeach
        </ul>
    @endif
</li>
@endforeach
@endif