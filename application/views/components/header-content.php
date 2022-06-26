<header>
    <nav class="navbar navbar-expand-lg navbar-light mb-3 border-bottom">
        <div class="container">
            <a id="logo" class="navbar-brand pt-1 pb-1 pl-2 pr-2 text-dark border border-secondary" href="<?php echo $GLOBALS['domain_https'] ?>"><?php echo strtoupper($GLOBALS['website_name']) ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Home"></span>Sách</a>
                    </li>     

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Tool" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chương trình
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/Tool/Load/ReadText">Đọc văn bản</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/Tool/Load/HtmlEditor">Trình soạn thảo HTML</a>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/About" target="_blank"></span>Chúng tôi là?</a>
                    </li>                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">Đăng nhập</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signup.php">Đăng ký</a>
                        </div>
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