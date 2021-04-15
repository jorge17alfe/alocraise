
<div class="main-footer" style="position:sticky; top:0;">
    <footer class="container pl-1">
        <div class=" footer ">
            <div class=" contacto text-center row  pt-3 pb-0 ">
                <dt class="col-12 col-sm-12 mb-1">Información</dt>
                <dd class="col-12 col-sm-4 my-0"> <a href="<?= SERVERURL ?>quienes-somos"><?= get_string('aboutus') ?></a> </dd>
                <dd class="col-12 col-sm-4 my-0"> <a href="mailto:info@alocraise.com"><?= config('email-info') ?></a> </dd>
                <!-- <dd class="col-12 col-sm-4 my-0"><a href="tel:+34010101010101">+34010101010101</a> </dd> -->
                <div class="col-12 col-sm-4 my-0">
                    <dd class="col-12 col-sm-12 my-0"> <a href="<?= SERVERURL ?>politica-privacidad"><?= get_string('privacy-politic') ?></a> </dd>
                    <dd class="col-12 col-sm-12 my-0"> <a href="<?= SERVERURL ?>politica-cookies"><?= get_string('cookies-politic') ?></a> </dd>
                    <dd class="col-12 col-sm-12 my-0"> <a href="<?= SERVERURL ?>aviso-legal"><?= get_string('legal-notice') ?></a> </dd>
                </div>
                <span class="col-12 col-sm-12 mt-2 mb-1"> &copy;<a id="copyright" href="<?= SERVERURL ?>" copyright="<?= SERVERURL ?>"> <?php echo config('title') . ' ' .  date('Y') ?></a></span>
            </div>
        </div>
    </footer>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?=assets("js/main.js")?>"></script>


</body>

</html>