<?php
error_reporting(E_ALL ^ E_NOTICE);
require dirname(__FILE__) . "/include/functions.php";
require dirname(__FILE__) . "/config.php";
include dirname(__FILE__) . "/translations/es.php";
require dirname(__FILE__) . "/include/head.php";
global $_ERROR;
?>
<div class="row  pt-2" id="code_qr">
    <h3 class="col-sm-12 text-center  mb-3">5.-<?= get_string('qrtitle'); ?> </h3>
    <div class="col-md-8">
        <p>&nbsp&nbsp&nbsp<?= get_string('qr1.1'); ?> <br> <br>
        &nbsp&nbsp&nbsp <?= get_string('qr1.2'); ?> </p>
        <div id="alert_placeholder">
            <?php
            if (strlen($_ERROR) > 0) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <?= $_ERROR; ?>
                </div>
            <?php
            } ?>
        </div>
        <div class="row">
            <?php
            // if ($_CONFIG['uploader'] == true) { 
            ?>
            <!-- <div class=" mb-2 ml-3">
                    <form method="post" enctype="multipart/form-data" id="sottometti" class='btn-20'>
                        <span class="btn  btn-file">
                            <i class="fa fa-upload"></i>
                            <input type="file" name="file" id="file">
                        </span>
                        <label><?= $_translations['upload_or_select_watermark']; ?></label>
                    </form>
                </div>  -->
            <?php
            // }
            /**
             * Marcas de agua
             */ ?>
            <form role="form" id="create" class="needs-validation" novalidate>
                <input type="submit" class="d-none">
                <input type="hidden" name="section" id="getsec" value="<?= $getsection; ?>">
                <?php
                //
                // Marcas de agua por defecto
                //
                if ($_CONFIG['uploader'] == true) { ?>
                    <!-- <div class="col-12">
                        <div class="logoselecta form-group">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light p-1 <?php if ($optionlogo == "none" && $uploaded == false) echo "active"; ?>" data-toggle="tooltip" data-placement="bottom">
                                    <input type="radio" name="optionlogo" value="none" <?php if ($optionlogo == "none" && $uploaded == false) echo "checked"; ?>>
                                    <img class="img-fluid" src="<?= SERVERURL ?>lib/generadorqr/images/x.png">
                                </label>
                                <?php

                                if ($logo && $upthumb) { ?>
                                    <label class="btn btn-light p-1 <?php if ($optionlogo == $upthumb || $uploaded == true) echo "active"; ?>">
                                        <input type="radio" name="optionlogo" id="optionsRadios6" value="<?= $upthumb; ?>" <?php if ($optionlogo == $upthumb || $uploaded == true) echo "checked"; ?>>
                                        <img src="<?= SERVERURL . $upthumb; ?>">
                                    </label>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div> -->
                <?php
                }
                /**
                 * CONFIGURACIÓN PRINCIPAL DEL CÓDIGO QR
                 */
                ?>
                <div class="col-sm-12 my-4">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <label><strong><?= get_string('background'); ?></strong></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text getcol"><i class="fa fa-qrcode fa-lg"></i></span>
                                </div>
                                <input type="text" class="form-control colorpickerback" data-format="hex" value="<?= $stringbackcolor; ?>" name="backcolor">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <label><strong><?= get_string('foreground');?></strong></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text getcol"><i class="fa fa-qrcode fa-lg"></i></span>
                                </div>
                                <input type="text" class="form-control colorpickerfront" data-format="hex" value="<?= $stringfrontcolor; ?>" name="frontcolor">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <label><strong><?= get_string('size'); ?></strong></label>
                            <select name="size" class="custom-select">
                                <?php
                                for ($i = 4; $i <= 24; $i += 4) {
                                    $value = $i * 25;
                                    echo '<option value="' . $i . '" ' . ($matrixPointSize == $i ? 'selected' : '') . '>' . $value . '</option>';
                                }; ?>
                            </select>
                        </div>
                        <div class="col-6 col-md-3">
                            <label><strong><?= get_string('error_correction_level'); ?></strong></label>
                            <select name="level" class="custom-select">
                                <option value="L" <?php if ($errorCorrectionLevel == "L") echo "selected"; ?>>
                                    <?= get_string('precition_l'); ?>
                                </option>
                                <option value="M" <?php if ($errorCorrectionLevel == "M") echo "selected"; ?>>
                                    <?= get_string('precition_m'); ?>
                                </option>
                                <option value="Q" <?php if ($errorCorrectionLevel == "Q") echo "selected"; ?>>
                                    <?= get_string('precition_q'); ?>
                                </option>
                                <option value="H" <?php if ($errorCorrectionLevel == "H") echo "selected"; ?>>
                                    <?= get_string('precition_h'); ?>
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="trans-bg" name="transparent">
                        <label class="custom-control-label" for="trans-bg"><strong><?= $_translations['transparent_background']; ?></strong></label>
                    </div>
                </div>
                <?php
                $styles = array('default', 'circle', 'plus', '3d');
                $styleselecta = '<div class="btn-group-toggle styleselecta d-inline-block" data-toggle="buttons">';
                foreach ($styles as $key => $style) {
                    $activeattr = ($key == 0) ? 'checked' : '';
                    $activeclass = ($key == 0) ? 'active' : '';

                    $styleselecta .= '<label class="btn btn-light p-1 ' . $activeclass . '">
                                    <input type="radio" name="style" value="' . $style . '" ' . $activeattr . '>
                                    <img title="' . $style . '" class="img-fluid" src="' . SERVERURL . 'lib/generadorqr/images/styleselect-' . $style . '.jpg">
                                </label>';
                }
                $styleselecta .= '</div>';
                ?>
                <div class="col-sm-12 mb-2">
                    <?= $styleselecta; ?>
                </div>

                <?php
                /**
                 * Datos de QR
                 */ ?>
                <div class="col-sm-12">
                    <div class="tab-content mt-3">
                        <?php
                        //
                        // LINK
                        //
                        if ($_CONFIG['link'] == true) { ?>
                            <div class="tab-pane fade <?php if ($getsection === "#link") echo "show active"; ?>" id="link">
                                <div class="form-group">
                                    <input type="hidden" name="link" id="malink" class="form-control" value="<?= SERVERURL . $parameter->data->nombre_web; ?>" required="required" />
                                </div>
                                <input type="hidden" id="title_enterprice" value="<?= $parameter->data->nombre_empresa ?>">
                            </div>
                        <?php
                        }
                        ?>

                    </div> <!-- tab content -->

                </div><!-- col sm12-->
            </form>
        </div> <!-- row -->
    </div><!-- col sm-8 -->

    <div class="col-md-4">
        <?php
        //
        // FINAL QR CODE placeholder
        //
        ?>
        <div class="placeresult btn-20 text-center">
            <div class="form-group text-center wrapresult ">
                <div class="resultholder">
                    <img class="img-fluid" src="<?= SERVERURL . $_CONFIG['placeholder']; ?>" />
                    <div class="infopanel"></div>
                </div>
            </div>
            <div class="preloader"><i class="fa fa-cog fa-spin"></i></div>
            <div class="form-group text-center linksholder"></div>
            <button class="btn btn-lg  ellipsis" id="submitcreate">
                <i class="fa fa-magic"></i> <?= get_string('generate_qrcode'); ?></button>
        </div>
    </div><!-- col sm4-->
    <div id="link_enterprice" class="text-center col-12 pt-5  ">
       
    </div>
   
</div>
<!-- biblioteca copia y pega -->
<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
<!-- Disparador copia y pega  -->
<script>
    var clipboard = new Clipboard('.btn');
</script>
<!-- estilos qr -->
<link href="<?= SERVERURL ?>lib/generadorqr/style.css" rel="stylesheet">
<link href="<?= SERVERURL ?>lib/generadorqr/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<!-- scrpit qr -->
<script src="<?= SERVERURL ?>lib/generadorqr/js/jquery-3.2.1.min.js"></script>
<script src="<?= SERVERURL ?>lib/generadorqr/js/popper.js"></script>
<!-- <script src="<?= SERVERURL ?>lib/generadorqr/bootstrap/js/bootstrap.min.js"></script> -->
<script src="<?= SERVERURL ?>lib/generadorqr/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<?php require assetsphp("js/qrjs") ?>