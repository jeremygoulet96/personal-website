<?php

include $path."inc/localization.php";

$header = simplexml_load_file($path.'assets/xml/'.$lang.'/header.xml');

if($lang == "en") {
    $newLang = "fr";
}
else {
    $newLang = "en";
}

?>

<header class="header">
    <div class="maxWidth">
        <div class="headerContainer">
            <a class="header__logo" href="<?php echo $path; ?>index.php">Jérémy Goulet</a>
            <a href="#" class="header__action icon icon--hamburger">Menu</a>
        </div>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "work"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>index.php"><?php echo $header->work; ?></a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "blog"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>blog/blog.php"><?php echo $header->blog; ?></a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "about"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>about/about.php"><?php echo $header->about; ?></a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($title == "contact"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>contact/contact.php"><?php echo $header->contact; ?></a>
                </li>
                <li class="nav__items">
                    <form method="get" action="#">
                        <div class="nav__link--separator">|</div>
                        <input class="nav__link nav__link--small" name="lang" type="submit" value="<?php echo ucfirst($newLang); ?>"/>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>
