<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="fluid-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ $siteName }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/admin">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle user-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span id="face-wrapper">
                            <img src="{!! Gravatar::src(Auth::user()->email) !!}" alt="{{ Auth::user()->name }}" class="circle-img header-face" width="45" height="45" />
                        </span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('admin.users.show', ['id' => Auth::user()->id]) }}">Profile</a></li>
                        <li><a href="{{ route('admin.auth.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>