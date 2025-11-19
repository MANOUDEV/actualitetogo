<div class="navbar-top d-none d-lg-block small">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center my-2">
            <!-- Top bar left -->
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link ps-0" href="/about">Qui sommes nous ?</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/publicites">Publicités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contactez Nous</a>
                </li>
                <li class="nav-item">
                    <in-first-menu></in-first-menu> 
                </li>
                 
            </ul>
            <!-- Top bar right -->
            <div class="d-flex align-items-center">

                <div>
                    <p class="mb-0 text-dark">{{ \Carbon\Carbon::now()->isoFormat('LL') }}</p>
                </div>

                <!-- Dark mode switch -->
                <div class="modeswitch" id="darkModeSwitch">
                    <div class="switch"></div>
                </div>

                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link px-2 fs-5" href="https://www.facebook.com/Togoactualite-148480121847124" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 fs-5" href="https://twitter.com/Togoactualite" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                        </svg></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 fs-5" href="https://fr.linkedin.com/in/togoactualite-togo-actualit%C3%A9-3a076648" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 fs-5" href="https://youtube.com" target="_blank"><i class="fab fa-youtube-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 pe-0 fs-5"  href="https://wa.link/qf0v9s" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Divider -->
        <div class="border-bottom border-2 border-primary opacity-1"></div>
    </div>
</div>