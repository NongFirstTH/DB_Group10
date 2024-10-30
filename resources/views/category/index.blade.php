@extends("layouts.layout")

@section("content")
<div class="min-h-screen w-full bg-gray-100 mt-14">
    <div class = 'relative h-auto w-auto top-16 '>
        @include("category.show-category")
    </div>
</div>
@endsection