<?php

$path = "../";
$title = "Blog"

?>

<!doctype html>
<html lang="en">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main class="blog">
    <h1 class="title visuallyHidden"><?php echo $title; ?></h1>
    <article class="blog__post">
        <header class="blog__header">
            <h2 class="blog__title">Veggie Meals cooking app evolves for the iPhone X</h2>
            <span class="blog__date">
                Posted on
                <time datetime="2018-01-07 11:00">January 7</time>
            </span>
        </header>
        <section>
            <picture>
                <source class="blog__image" srcset="<?php echo $path; ?>assets/images/work/iphone-x/hero.jpg 1x, <?php echo $path; ?>assets/images/work/iphone-x/hero@2x.jpg 2x" type="image/jpeg" />
                <img class="blog__image" src="<?php echo $path; ?>assets/images/work/iphone-x/hero.jpg" srcset="<?php echo $path; ?>assets/images/work/iphone-x/hero.jpg 1x, <?php echo $path; ?>assets/images/work/iphone-x/hero@2x.jpg 2x" alt="A photo of me." />
            </picture>
            <h3 class="subtitle">Subtitle</h3>
            <p>
                Also, in my free-time, I’ve made a few <span class="bold">projects</span> in the iOS jailbreak community.
                I am the <span class="bold italic">designer</span> of <a class="link" href="#">ClassicFolders</a>,
                <a class="link" href="#">NCWeather</a>, <a class="link" href="#">NCBlurriedBackground</a> and
                <a class="link" href="#">Ventana</a> to name a few.
                To see more of my <span class="bold italic underline">portfolio</span>, go to my <a class="link" href="#">Work</a> page.
            </p>
            <h3 class="subtitle">Subtitle</h3>
            <p>
                Also, in my free-time, I’ve made a few <span class="bold">projects</span> in the iOS jailbreak community.
                I am the <span class="bold italic">designer</span> of <a class="link" href="#">ClassicFolders</a>,
                <a class="link" href="#">NCWeather</a>, <a class="link" href="#">NCBlurriedBackground</a> and
                <a class="link" href="#">Ventana</a> to name a few.
                To see more of my <span class="bold italic underline">portfolio</span>, go to my <a class="link" href="#">Work</a> page.
            </p>
        </section>
    </article>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
