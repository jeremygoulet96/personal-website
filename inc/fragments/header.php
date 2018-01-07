<header class="header">
    <div class="maxWidth">
        <div class="headerContainer">
            <a class="header__logo" href="<?php echo $path; ?>index.php">Jérémy Goulet</a>
            <a href="#" class="header__action icon icon--hamburger">Menu</a>
        </div>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "Work"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>index.php">Work</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "Blog"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>blog/blog.php">Blog</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "About me"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>about/about.php">About</a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "Contact"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>contact/contact.php">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
