@extends('category::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('category.name') !!}
    </p>

{{--    <input type="text" value="{{ old('title', optional($var ?? null)->title ) }}">--}}
@endsection
