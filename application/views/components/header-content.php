<header>
    <nav class="navbar navbar-expand-lg navbar-light mb-3 border-bottom">
        <div class="container">
            <a id="logo" class="navbar-brand pt-1 pb-1 pl-2 pr-2 text-dark border border-secondary" href="<?php echo $GLOBALS['domain_https'] ?>"><?php echo strtoupper($GLOBALS['website_name']) ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            TÀI KHOẢN
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Thông Tin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Thoát</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/About" target="_blank"></span>Chúng tôi là?</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary border my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>