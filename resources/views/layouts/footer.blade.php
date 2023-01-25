<footer>
    <div class="nav-menu footer-nav-menu">
        <div>
            @svg('footer', ['width' => 100, 'height' => 100])
        </div>

        <ul class="footer-nav-menu__main nav-menu__main">
            <li class="menu__list"><a class="menu__link footer-menu__link" href="/">Home</a></li>
            <li class="menu__list"><a class="menu__link footer-menu__link" href="/posts">Posts</a></li>
            <li class="menu__list"><a class="menu__link footer-menu__link" href="/about">About</a></li>
        </ul>

        <div class="footer-subscribe">
            <span>Follow for news</span>
            <form action="/subscribe" class="footer-subscribe-form" method="post">
                @csrf
                <input type="text" placeholder="First name" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="submit"  class="btn btn-subscribe" value="Subscribe">
            </form>
        </div>

        <ul class="footer-nav-menu__social-links">
            <li class="social-links__list"><a class="social-links__link" href="https://www.facebook.com/">@svg('fb')</a></li>
            <li class="social-links__list"><a class="social-links__link" href="https://www.twiter.com/">@svg('twt')</a></li>
            <li class="social-links__list"><a class="social-links__link" href="https://www.youtube.com/">@svg('youtube')</a></li>
        </ul>


    </div>
</footer>
