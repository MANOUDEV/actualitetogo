<!-- Navbar START -->
<div class="navbar-sticky header-static">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container">
            <div class="w-100 bg-light d-flex">

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-muted h6 ps-3">MENU</span>
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Main navbar START -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav navbar-nav-scroll navbar-lh-sm" >

                        <li class="nav-item">
                            <a style="font-size: 12px" class="nav-link  " href="/"  id="homeMenu">ACCUEIL</a>
                        </li>

                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a style="font-size: 12px" class="nav-link  dropdown-toggle" href="#"  id="megaMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TOGO ACTUALITE</a>
                            <div class="dropdown-menu" aria-labelledby="megaMenu" >
                                <div>
                                    <togoactualite-header></togoactualite-header>
                                </div>
                            </div>
                        </li>

                        <!-- Nav item 3 Post -->
                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a style="font-size: 12px" class="nav-link  dropdown-toggle" href="#"  id="megaMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">RUBRIQUES+</a>
                            <div class="dropdown-menu" aria-labelledby="megaMenu">
                                <div>
                                    <rubriques-header></rubriques-header>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a style="font-size: 12px" class="nav-link  dropdown-toggle" href="#"  id="megaMenuH" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ECONOMIE</a>
                            <div class="dropdown-menu" aria-labelledby="megaMenuH">
                                <div>
                                    <togoactualite-header></togoactualite-header>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a style="font-size: 12px" class="nav-link  dropdown-toggle" href="#"  id="megaMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DIASPORA</a>
                            <div class="dropdown-menu" aria-labelledby="megaMenu">
                                <div>
                                    <diaspora-header></diaspora-header>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a style="font-size: 12px" class="nav-link  dropdown-toggle" href="#"  id="megaMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INTERNATIONAL</a>
                            <div class="dropdown-menu" aria-labelledby="megaMenu">
                                <div>
                                    <international-header></international-header>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown dropdown-fullwidth">
                            <a style="font-size: 12px" class="nav-link  dropdown-toggle" href="#"  id="megaMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SPORT</a>
                            <div class="dropdown-menu" aria-labelledby="megaMenu">
                                <div>
                                    <sports-header></sports-header>
                                </div>
                            </div>
                        </li>
                         
                        <li class="nav-item"> <a style="font-size: 12px" class="nav-link "  href="/infos-pratiques">INFOS PRATIQUES</a></li>

                    </ul>
                </div>
                <!-- Main navbar END -->

                <!-- Nav right START -->
                <div class="nav flex-nowrap align-items-center me-2">

                    <in-second-menu class="nav-item" style="margin-top: 7px"></in-second-menu>

                    <!-- Nav Search -->
                    <div class="nav-item dropdown nav-search dropdown-toggle-icon-none">
                        <a style="font-size: 12px" class="nav-link  text-uppercase dropdown-toggle" role="button" href="/search-posts" >
                            <i class="bi bi-search fs-4"> </i>
                        </a>

                    </div>


                    <!-- Offcanvas menu toggler -->
                    <div class="nav-item">
                        <a style="font-size: 12px" class="nav-link  pe-0" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu">
                            <i class="bi bi-text-right rtl-flip fs-2" data-bs-target="#offcanvasMenu"> </i>
                        </a>
                    </div>
                </div>
                <!-- Nav right END -->
            </div>
        </div>
    </nav>
</div>
<!-- Navbar END -->
