<?php

$path = "../";
$page = "contact";

include $path."inc/localization.php";

$contact = simplexml_load_file($path.'assets/xml/'.$lang.'/contact.xml');

$title = $contact->title;

?>

<!doctype html>
<html lang="<?php echo $lang; ?>">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <h1 class="title"><?php echo $title; ?></h1>

    <p><?php echo $contact->subtitle; ?></p>

    <form class="form" method="get" action="<?php echo $path; ?>contact/contact.php">
        <div class="inputContainer">
            <label for="firstname" class="form__label"><?php echo $contact->form->input->firstName; ?>:</label>
            <input type="text" class="form__input" id="firstname" name="firstname" placeholder="<?php echo $contact->form->input->firstName; ?>">

            <label for="lastname" class="form__label"><?php echo $contact->form->input->lastName; ?>:</label>
            <input type="text" class="form__input" id="lastname" name="lastname" placeholder="<?php echo $contact->form->input->lastName; ?>">
        </div>

        <label for="email" class="form__label"><?php echo $contact->form->input->email; ?>:</label>
        <input type="text" class="form__input" id="email" name="email" placeholder="<?php echo $contact->form->input->email; ?>">

        <label for="subject" class="form__label"><?php echo $contact->form->input->subject; ?>:</label>
        <input type="text" class="form__input" id="subject" name="subject" placeholder="<?php echo $contact->form->input->subject; ?>">

        <label for="message" class="form__label"><?php echo $contact->form->input->message; ?>:</label>
        <textarea class="form__input" id="message" name="message" placeholder="<?php echo $contact->form->input->message; ?>"></textarea>

        <input class="button" type="submit" value="<?php echo $contact->form->button->label; ?>">
    </form>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
