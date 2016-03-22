<div class="widget">
    <h3>Categories</h3>
    <ul class="scrollable-widget">
        @foreach($categories as $category)
            <li>
                <label class="selected-categories checkbox">
                    {{ Form::checkbox('categoryId[]', $category->id, in_array($category->id, $postCategories)) }}{{ $category->name }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
