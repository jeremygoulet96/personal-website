<?php

$path = "../";
$title = "About me"

?>

<!doctype html>
<html lang="en">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <h1 class="title"><?php echo $title; ?></h1>
    <picture>
        <source class="about__image" srcset="<?php echo $path; ?>assets/images/about/me.jpg 1x, <?php echo $path; ?>assets/images/about/me@2x.jpg 2x" type="image/jpeg" />
        <img class="about__image" src="<?php echo $path; ?>assets/images/about/me.jpg" srcset="<?php echo $path; ?>assets/images/about/me.jpg 1x, <?php echo $path; ?>assets/images/about/me@2x.jpg 2x" alt="A photo of me." />
    </picture>
    <p>
        Hi! I’m Jérémy Goulet. I’m a french canadian living in Quebec City studying multimedia.
    </p>
    <p>
        I like to design and reverse engineer designs to understands what went through the head of the designer.
        I also like to make websites and code. I am fluent in HTML, CSS (SASS), jQuery, Javascript, TypeScript, and SQL.
    </p>
    <p>
        In summer of 2016, I interned as a Web developer and designer at <a class="link" href="#">Spektrum Media</a> in Quebec City, Canada.
    </p>
    <p>
        Also, in my free-time, I’ve made a few projects in the iOS jailbreak community.
        I am the designer of <a class="link" href="#">ClassicFolders</a>,
        <a class="link" href="#">NCWeather</a>, <a class="link" href="#">NCBlurriedBackground</a> and
        <a class="link" href="#">Ventana</a> to name a few.
        To see more of my portfolio, go to my <a class="link" href="#">Work</a> page.
    </p>
    <p>
        Feel free to contact me through my <a class="link" href="#">Contact</a> page,
        <a class="link" href="mailto:info@jeremygoulet.ca">e-mail</a> or
        <a class="link" href="https://twitter.com/jeremygoulet" target="_blank">Twitter</a>.
    </p>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
