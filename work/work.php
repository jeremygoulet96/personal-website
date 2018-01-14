<?php

$path = "../";
$page = "work";

include $path."inc/localization.php";

//$blog = simplexml_load_file($path.'assets/xml/'.$lang.'/blog.xml');

//$title = $blog->title;
$title = "work";

?>

<!doctype html>
<html lang="<?php echo $lang; ?>">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <article class="work__article">
        <header class="work__header">
            <picture>
                <source class="banner" srcset="<?php echo $path; ?>assets/images/work/ncweather/banner.jpg 1x, <?php echo $path; ?>assets/images/work/ncweather/banner@2x.jpg 2x" type="image/jpeg" />
                <img class="banner" src="<?php echo $path; ?>assets/images/work/ncweather/banner.jpg" srcset="<?php echo $path; ?>assets/images/work/ncweather/banner.jpg 1x, <?php echo $path; ?>assets/images/work/ncweather/banner@2x.jpg 2x" alt="A photo of me." />
            </picture>
        </header>
        <section>
            <h1 class="title">NCWeather</h1>
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
            <div class="quoteContainer">
                <p class="quote">I hired Eli to create a new application icon for MailMate. His concepts were refined with great technical skill and an extreme attention to detail. I'm very happy about the end result. Clearly, Eli takes his work very seriously.</p>
                <span class="quote__author"><a class="link" href="#">Thomas Finch</a>, NCWeather Developer</span>
            </div>
            <p>
                Also, in my free-time, I’ve made a few <span class="bold">projects</span> in the iOS jailbreak community.
                I am the <span class="bold italic">designer</span> of <a class="link" href="#">ClassicFolders</a>,
                <a class="link" href="#">NCWeather</a>, <a class="link" href="#">NCBlurriedBackground</a> and
                <a class="link" href="#">Ventana</a> to name a few.
                To see more of my <span class="bold italic underline">portfolio</span>, go to my <a class="link" href="#">Work</a> page.
            </p>
            <picture>
                <source class="banner" srcset="<?php echo $path; ?>assets/images/work/ncweather/banner.jpg 1x, <?php echo $path; ?>assets/images/work/ncweather/banner@2x.jpg 2x" type="image/jpeg" />
                <img class="banner" src="<?php echo $path; ?>assets/images/work/ncweather/banner.jpg" srcset="<?php echo $path; ?>assets/images/work/ncweather/banner.jpg 1x, <?php echo $path; ?>assets/images/work/ncweather/banner@2x.jpg 2x" alt="A photo of me." />
            </picture>
        </section>
    </article>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
