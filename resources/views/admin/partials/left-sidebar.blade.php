<ul class="sidebar-nav">
    <li>
        <a href="{{ route('admin.dashboard.index') }}"><span class="fa fa-dashboard fa-2x menu-icons"></span> Dashboard</a>
    </li>
    <li>
        <a href="{{ route('admin.posts.index') }}"><span class="fa fa-file-text-o fa-2x menu-icons"></span> Posts</a>
    </li>
    <li>
        <a href="{{ route('admin.posts.index') }}?type=page"><span class="fa fa-file-powerpoint-o fa-2x menu-icons"></span> Pages</a>
    </li>
    <li>
        <a href="{{ route('admin.categories.index') }}"><span class="fa fa-tags fa-2x menu-icons"></span> Categories</a>
    </li>
    <li>
        <a href="{{ route('admin.users.index') }}"><span class="fa fa-users fa-2x menu-icons"></span> Users</a>
    </li>
</ul>
