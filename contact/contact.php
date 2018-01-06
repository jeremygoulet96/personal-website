<?php

$path = "../";
$title = "Contact"

?>

<!doctype html>
<html lang="en">

<?php include $path."inc/fragments/head.php"; ?>

<body>

<?php include $path."inc/fragments/header.php"; ?>

<main>
    <h1 class="title"><?php echo $title; ?></h1>
    <p>
        Feel free to send me an e-mail through this form! I’ll answer as fast as I can!
    </p>
    <form class="form" method="get" action="<?php echo $path; ?>contact/contact.php">
        <div class="inputContainer">
            <label for="firstname" class="form__label">First name:</label>
            <input type="text" class="form__input" id="firstname" name="firstname" placeholder="First name">

            <label for="lastname" class="form__label">Last name:</label>
            <input type="text" class="form__input" id="lastname" name="lastname" placeholder="Last name">
        </div>

        <label for="email" class="form__label">E-mail address:</label>
        <input type="text" class="form__input" id="email" name="email" placeholder="E-mail address">

        <label for="subject" class="form__label">Subject:</label>
        <input type="text" class="form__input" id="subject" name="subject" placeholder="Subject">

        <label for="message" class="form__label">Message:</label>
        <textarea class="form__input" id="message" name="message" placeholder="Message"></textarea>

        <input class="button" type="submit" value="Send">
    </form>
</main>

<?php include $path."inc/fragments/footer.php"; ?>

</body>
</html>
