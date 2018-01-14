<?php

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
                    <a class="nav__link<?php if($page == "work"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>"><?php echo $header->work; ?></a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($page == "downloads"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>downloads/"><?php echo $header->downloads; ?></a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($page == "about"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>about/"><?php echo $header->about; ?></a>
                </li>
                <li class="nav__item">
                    <a class="nav__link<?php if($page == "contact"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>contact/"><?php echo $header->contact; ?></a>
                </li>
                <li class="nav__items">
                    <form method="get">
                        <button class="nav__link nav__link--lang" name="lang" type="submit" value="<?php echo $newLang; ?>"><?php echo ucfirst($newLang); ?></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>
