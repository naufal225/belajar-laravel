@extends("layouts.main")

@section("container")
    <h1 class="mb-5">Post Categories</h1>

    <ul>
    @foreach($categories as $category)
        <li>
            <h1 class="my-3">
                <a class="text-decoration-none" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
            </h1>
        </li>
    @endforeach
    </ul>

@endsection