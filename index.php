<?php

$path = "./";
$page = "work";

include $path."inc/localization.php";

$work = simplexml_load_file($path.'assets/xml/'.$lang.'/work.xml');

$title = $work->title;

?>

<!doctype html>
<html lang="<?php echo $lang; ?>">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <h1 class="title"><?php echo $title; ?></h1>
    <ul class="work__list">

        <?php foreach ($work->project as $projects) { ?>

            <li class="work__item" id="<?php echo $projects->infos->friendlyName; ?>">
                <picture>
                    <source class="work__image" srcset="<?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero.jpg 1x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@2x.jpg 2x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@3x.jpg 3x" type="image/jpeg" />
                    <img class="work__image" src="<?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero.jpg" srcset="<?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero.jpg 1x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@2x.jpg 2x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@3x.jpg 3x" alt="<?php echo $projects->image->alt; ?>" />
                </picture>
                <div class="work__info">
                    <h2 class="subtitle"><?php echo $projects->infos->title; ?></h2>
                    <p>
                        <?php echo $projects->infos->description; ?>
                    </p>
                    <div class="actions">
                        <label class="actions--label"><?php echo $projects->infos->actions->label; ?></label>
                        <div class="buttonContainer">
                            <?php foreach ($projects->infos->actions->button as $buttons) { ?>
                                <a class="button" <?php if(isset($buttons->target)) { echo $buttons->target; } ?> href="<?php if(!isset($buttons->target)) { echo $path."assets/downloads/".$projects->infos->friendlyName.".zip"; } else { echo $buttons->url; } ?>"><?php echo $buttons->label; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </li>

        <?php } ?>

    </ul>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
