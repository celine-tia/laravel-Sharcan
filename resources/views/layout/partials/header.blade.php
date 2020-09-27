<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">E-coco, tu coco ?</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category.index')}}">Categories</a>
                    </li>
                    @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart')}}">Panier</a>
                    </li>
                    <li class="nav-item text-center align-center">
                        <form method="POST" action="{{ route('logout') }}" class="align-middle h-100">
                            @csrf
                            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm p-2" onclick="event.preventDefault(); this.closest('form').submit();">Se Deconnecter</a>
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
