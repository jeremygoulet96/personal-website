<?php

$path = "../";
$page = "about";

include $path."inc/localization.php";

$about = simplexml_load_file($path.'assets/xml/'.$lang.'/about.xml');
$work = simplexml_load_file($path.'assets/xml/'.$lang.'/downloads.xml');

$title = $about->title;

?>

<!doctype html>
<html lang="<?php echo $lang; ?>">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <article>
        <section>
            <h1 class="title" data-title="<?php echo $title; ?>"><?php echo $title; ?></h1>

            <picture>
                <source class="about__image" srcset="<?php echo $path; ?>assets/images/about/me.jpg 1x, <?php echo $path; ?>assets/images/about/me@2x.jpg 2x" type="image/jpeg" />
                <img class="about__image" src="<?php echo $path; ?>assets/images/about/me.jpg" srcset="<?php echo $path; ?>assets/images/about/me.jpg 1x, <?php echo $path; ?>assets/images/about/me@2x.jpg 2x" alt="<?php echo $about->image->alt; ?>" />
            </picture>

            <p>
                <?php echo $about->p1; ?>
            </p>

            <p>
                <?php echo $about->p2; ?>
            </p>

            <p>
                <?php echo $about->p3->p3a.'<a class="link" href="'.$about->p3->link->url.'">'.$about->p3->link->title.'</a>'.$about->p3->p3b; ?>
            </p>

            <p>
                <?php echo $about->p4->p4a
                    .'<a class="link" href="'.$about->p4->link1->url.'">'.$about->p4->link1->title.'</a>'
                    .$about->p4->p4b
                    .'<a class="link" href="'.$about->p4->link2->url.'">'.$about->p4->link2->title.'</a>'
                    .$about->p4->p4c
                    .'<a class="link" href="'.$about->p4->link3->url.'">'.$about->p4->link3->title.'</a>'
                    .$about->p4->p4d
                    .'<a class="link" href="'.$about->p4->link4->url.'">'.$about->p4->link4->title.'</a>'
                    .$about->p4->p4e
                    .'<a class="link" href="'.$about->p4->link5->url.'">'.$about->p4->link5->title.'</a>'
                    .$about->p4->p4f
                ; ?>
            </p>

            <p>
                <?php echo $about->p5->p5a
                    .'<a class="link" href="'.$about->p5->link1->url.'">'.$about->p5->link1->title.'</a>'
                    .$about->p5->p5b
                    .'<a class="link" href="'.$about->p5->link2->url.'">'.$about->p5->link2->title.'</a>'
                    .$about->p5->p5c
                    .'<a class="link" target="_blank" href="'.$about->p5->link3->url.'">'.$about->p5->link3->title.'</a>'
                    .$about->p5->p5d
                ; ?>
            </p>

            <h2>Latest work:</h2>

            <ul class="projects__list">

                <?php foreach ($work->project as $projects) { ?>

                    <li>
                        <a href="index.php#<?php echo $projects->infos->friendlyName; ?>"
                        <picture>
                            <source class="item__image" srcset="<?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero.jpg 1x, <?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero@2x.jpg 2x, <?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero@3x.jpg 3x" type="image/jpeg" />
                            <img class="item__image" src="<?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero.jpg" srcset="<?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero.jpg 1x, <?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero@2x.jpg 2x, <?php echo $path; ?>assets/images/downloads/<?php echo $projects->infos->friendlyName; ?>/hero@3x.jpg 3x" alt="<?php echo $projects->image->alt; ?>" />
                        </picture>
                    </li>

                <?php } ?>

            </ul>
        </section>
    </article>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
