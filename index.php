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
    <h1 class="title" data-title="<?php echo $title; ?>"><?php echo $title; ?></h1>
    <ul class="list">

        <?php foreach ($work->project as $projects) { ?>

            <li class="list__item" id="<?php echo $projects->infos->friendlyName; ?>">
                <picture>
                    <source class="item__image" srcset="<?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero.jpg 1x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@2x.jpg 2x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@3x.jpg 3x" type="image/jpeg" />
                    <img class="item__image" src="<?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero.jpg" srcset="<?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero.jpg 1x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@2x.jpg 2x, <?php echo $path; ?>assets/images/work/<?php echo $projects->infos->friendlyName; ?>/hero@3x.jpg 3x" alt="<?php echo $projects->image->alt; ?>" />
                </picture>
                <div class="item__info">
                    <h2 class="item__title"><?php echo $projects->infos->title; ?></h2>
                    <p class="item__body">
                        <?php echo $projects->infos->description; ?>
                    </p>
                    <div class="actions">
                        <?php if(isset($projects->infos->actions->label)) { ?>
                        <div class="labelContainer">
                            <label class="actions--label"><?php echo $projects->infos->actions->label; ?></label>
                            <div class="label__separator"></div>
                        </div>
                        <?php } ?>
                        <div class="buttonContainer">
                            <?php foreach ($projects->infos->actions->button as $buttons) { ?>
                                <a class="button" <?php if(isset($buttons->target)) { echo $buttons->target; } ?> href="<?php if(!isset($buttons->target)) { echo $path.$buttons->url; } else { echo $buttons->url; } ?>"><?php echo $buttons->label; ?></a>
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
