<table class="table table-striped table-bordered table-condensed">
    <tr>
        <th>All categories</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></td>
        <td><a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Edit</a></td>
        {{-- TODO:create a route. --}}
    </tr>
    @endforeach
</table>