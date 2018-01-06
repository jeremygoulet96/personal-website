<footer class="footer">
    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__item">
                <a class="nav__link<?php if($title == "Work"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>index.php">Work</a>
            </li>
            <li class="nav__item">
                <a class="nav__link<?php if($title == "Blog"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>blog/blog.php">Blog</a>
            </li>
            <li class="nav__item">
                <a class="nav__link<?php if($title == "About me"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>about/about.php">About</a>
            </li>
            <li class="nav__item">
                <a class="nav__link<?php if($title == "Contact"){echo ' nav__link--active';} ?>" href="<?php echo $path; ?>contact/contact.php">Contact</a>
            </li>
        </ul>
    </nav>
    <small class="footer__copyright">2018 © Jérémy Goulet</small>
</footer>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<script>window.jQuery || document.write('<script src="<?php echo $path; ?>bower_components/jquery-3.2.1.min/index.js">\x3C/script>')</script>

<script src="<?php echo $path; ?>bower_components/requirejs/require.js" data-main="<?php echo $path; ?>assets/js/main.js"></script>
