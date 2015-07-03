<nav>
    <div class="nav-wrapper z-depth-2">
        <a href="{{URL::to('/')}}" class="brand-logo center">Githubbifier!</a>
        <a href="{{URL::to('/run')}}" data-activates="mobile-demo" class="button-collapse">run</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="{{URL::to('/run')}}">run</a></li>
            <li><a href="{{URL::to('/about')}}">about</a></li>
            <li><a href="{{URL::to('https://github.com/ecommerce-technician/example-php-challenge')}}">install</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="{{URL::to('/run')}}">run</a></li>
            <li><a href="{{URL::to('/about')}}">about</a></li>
            <li><a href="{{URL::to('https://github.com/ecommerce-technician/example-php-challenge')}}">install</a></li>
        </ul>
    </div>
</nav>