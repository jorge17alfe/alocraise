<?php
include_once '../../../app/config/config.php';
date_default_timezone_set('UTC');
require dirname(dirname(__FILE__)) . "/config.php";
include dirname(dirname(__FILE__)) . "/translations/es.php";

$output_data = false;
$otp = false;

$outdir = $_CONFIG['qrcodes_dir'];
$PNG_TEMP_DIR = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $outdir . DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = SERVERURL . 'lib/generadorqr/' . $outdir . '/';

require dirname(dirname(__FILE__)) . "/lib/phpqrcode.php";
require dirname(dirname(__FILE__)) . "/lib/class-qrcdr.php";
require dirname(dirname(__FILE__)) . "/include/functions.php";

$optionlogo   = 'none';
$output_data = false;
$getsection = filter_input(INPUT_POST, "section", FILTER_SANITIZE_STRING);
$setbackcolor = filter_input(INPUT_POST, "backcolor", FILTER_SANITIZE_STRING);
$setfrontcolor = filter_input(INPUT_POST, "frontcolor", FILTER_SANITIZE_STRING);
$optionlogo = filter_input(INPUT_POST, "optionlogo", FILTER_SANITIZE_STRING);
$optionstyle = filter_input(INPUT_POST, "style", FILTER_SANITIZE_STRING);

if ($setbackcolor) {
    $stringbackcolor = $setbackcolor;
}
if ($setfrontcolor) {
    $stringfrontcolor = $setfrontcolor;
}

$backcolor = hexdec(str_replace('#', '0x', $stringbackcolor));
$frontcolor = hexdec(str_replace('#', '0x', $stringfrontcolor));

$level = filter_input(INPUT_POST, "level", FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, "size", FILTER_SANITIZE_STRING);

if (in_array($level, array('L', 'M', 'Q', 'H'))) {
    $errorCorrectionLevel = $level;
}
if ($size) {
    $matrixPointSize = min(max((int)$size, 4), 32);
}

switch ($getsection) {
    case '#link':
        $output_data = filter_input(INPUT_POST, "link", FILTER_VALIDATE_URL);
        break;
}

if ($output_data) {

    $trasp = (isset($_POST['transparent']) ? true : false);

    $filenamepng = $PNG_TEMP_DIR . md5($output_data . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
    $filenamesvg = $PNG_TEMP_DIR . md5($output_data . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.svg';
    QRcdr::png($output_data, $filenamepng, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor, $optionstyle);
    QRcdr::svg($output_data, $filenamesvg, $errorCorrectionLevel, $matrixPointSize, 2, false, $backcolor, $frontcolor, $optionstyle);

    $finalpng = basename($filenamepng);
    $finalsvg = basename($filenamesvg);

    $mergedimage = false;

    if ($trasp) {
        $finalpng = basename(transparentBg($filenamepng));
    }
    if ($optionlogo && $optionlogo !== 'none') {
        $mergedimage = mergeImages('../' . $PNG_WEB_DIR . $finalpng, '../' . $optionlogo, false);
        // $mergedimage = mergeImages($PNG_WEB_DIR . $finalpng, '../temp/' . $optionlogo, false);
    }
    if ($mergedimage) {
        $placeholder = $PNG_WEB_DIR . $mergedimage;
    } else {
        $placeholder = $PNG_WEB_DIR . $finalpng;
    }

    $result = array(
        'png' => $finalpng,
        'svg' => $finalsvg,
        'placeholder' => $placeholder,
        'optionlogo' => $optionlogo,
        'size' => $size,
        'colortext' => $setfrontcolor
    );
    if ($otp) {
        $result['otp'] = $otp;
    }

    $result = json_encode($result);
} else {
    $result = json_encode(array('errore' => getString('provide_more_data'), 'placeholder' => $_CONFIG['placeholder']));
}
echo $result;
