@props(['title' => '', 'pageName' => ''])
<x-base-layout :$title>
    {{$slot}}
</x-base-layout>
