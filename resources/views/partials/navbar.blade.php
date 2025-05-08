<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('topics.index') }}">
            <i class="bi bi-chat-left-dots"></i> Forumas
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                @if (Route::has('topics.index'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topics.index') }}">
                            <i class="bi bi-list-ul"></i> Temos
                        </a>
                    </li>
                @endif
            </ul>

            
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item d-flex align-items-center">
                        <i class="bi bi-person-circle me-1"></i>
                        <a href="{{ route('profile.edit') }}">
    {{ Auth::user()->name }}
</a>

</li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm ms-2" type="submit">
                                <i class="bi bi-box-arrow-right"></i> Atsijungti
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Prisijungti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="bi bi-pencil-square"></i> Registruotis
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
