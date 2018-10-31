<nav class="navbar navbar-expand-lg navbar-light navbar-laravel fixed-top">
    <div class="container">
        <a href="{{ route('pages.index') }}" class="navbar-brand">{{ config('app.name', 'Fai Tai Compt') }}</a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-content">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('users.register') }}" class="nav-link">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.login') }}" class="nav-link">Se connecter</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item nav-link">Bonjour, {{ Auth::user()->name }}</li>

                    <li class="nav-item">
                        <a href="{{ route('users.logout') }}" class="nav-link" onclick="doucment.getElementById('form-logout').submit();">Se déconnecter</a>
                    </li>

                    {!! Form::open([ 'route' => 'users.logout', 'class' => 'd-none' ]) !!}{!! Form::close() !!}
                @endauth
            </ul>
        </div>
    </div>
</nav>
