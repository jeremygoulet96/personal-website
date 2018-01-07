<?php

$path = "./";
$title = "Work"

?>

<!doctype html>
<html lang="en">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <h1 class="title"><?php echo $title; ?></h1>
    <ul class="work__list">
        <li class="work__item">
            <picture>
                <source class="work__image" srcset="<?php echo $path; ?>assets/images/work/iphone-x/hero.jpg 1x, <?php echo $path; ?>assets/images/work/iphone-x/hero@2x.jpg 2x" type="image/jpeg" />
                <img class="work__image" src="<?php echo $path; ?>assets/images/work/iphone-x/hero.jpg" srcset="<?php echo $path; ?>assets/images/work/iphone-x/hero.jpg 1x, <?php echo $path; ?>assets/images/work/iphone-x/hero@2x.jpg 2x" alt="iPhone X" />
            </picture>
            <div class="work__info">
                <h2 class="subtitle">iPhone X Mockup</h2>
                <p>
                    I've been working on this one for quite some time now. Here's a free download for you!
                    The sketch file contains all of the icons, Control Center, and the device — all in vector.
                    If you like it, don't hesitate to like and share! For commercial use, just ask me !
                </p>
                <div class="actions">
                    <label class="actions--label">More info</label>
                    <div class="buttonContainer">
                        <a class="button" href="#">Download Sketch file</a>
                    </div>
                </div>
            </div>
        </li>
        <li class="work__item">
            <picture>
                <source class="work__image" srcset="./assets/images/work/ncweather/hero.jpg 1x, ./assets/images/work/ncweather/hero@2x.jpg 2x" type="image/jpeg" />
                <img class="work__image" src="./assets/images/work/ncweather/hero.jpg" srcset="./assets/images/work/ncweather/hero.jpg 1x, ./assets/images/work/ncweather/hero@2x.jpg 2x" alt="iPhone X" />
            </picture>
            <div class="work__info">
                <h2 class="subtitle">NCWeather</h2>
                <p>
                    NCWeather is a minimalistic weather widget for iOS 7 and 8. Apple got rid of the built-in
                    weather widget with iOS 7, but NCWeather is the replacement! Tapping on the widget switches
                    between current conditions, hourly weather, and weekly forecast views.
                </p>
                <div class="actions">
                    <label class="actions--label">More info</label>
                    <div class="buttonContainer">
                        <a class="button" href="#">App Store (Free)</a>
                        <a class="button" href="#">Cydia ($0.99)</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
