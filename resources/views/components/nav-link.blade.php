@props(['icon' => '', 'active' => false])
<a class="{{$active ? 'sidebar-link-active group' : 'sidebar-link group'}}" aria-current="{{$active ? 'page' : 'false'}}"{{$attributes}}>
    {{$icon}}
    <span class="ms-3">{{$slot}}</span>
</a>
