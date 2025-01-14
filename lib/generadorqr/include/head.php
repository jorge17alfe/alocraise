<?php

date_default_timezone_set('UTC');
$getsection = $_CONFIG['default_tab'];
$optionlogo = 'none';

$PNG_TEMP_DIR = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $_CONFIG['qrcodes_dir'] . DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = dirname(dirname(__FILE__)) . '/' . $_CONFIG['qrcodes_dir'] . '/';
$USER_DIR = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $_CONFIG['uploads_dir'] . DIRECTORY_SEPARATOR;
$USER_UPLOADS = dirname(dirname(__FILE__)) . '/' . $_CONFIG['uploads_dir'] . '/';
$upmax = $_CONFIG['upload_max_filesize'];
$MAX_FILESIZE = $upmax * 1024;

if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR);
}
if (!file_exists($USER_DIR)) {
    mkdir($USER_DIR);
}

$matrixPointSize = 8;
$errorCorrectionLevel = 'Q'; // available: L, M, Q, H
$stringbackcolor = $_CONFIG['qr_bgcolor'];
$stringfrontcolor = $_CONFIG['qr_color'];

$upthumb = false;
$uploaded = false;
$logo = false;
$output_data = false;

if ($_FILES) {
    $uploaded = true;
    $allowedExts = array("gif", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
        && in_array($extension, $allowedExts)
    ) {
        $filesize = $_FILES["file"]["size"];
        $roundsize = round(($filesize / 1024), 2);

        if ($filesize >= $MAX_FILESIZE) {
            setError("Tamaño máximo superado" . " " . $roundsize . "Kb (max: " . ($MAX_FILESIZE / 1024) . " Kb)");
            return false;
        } elseif ($_FILES["file"]["error"] > 0) {
            setError($_FILES["file"]["error"]);
            return false;
        } else {
            $time = date('m-d');
            $filename = $time . $_FILES["file"]["name"];

            if (!file_exists($USER_UPLOADS . $filename)) {
                move_uploaded_file($_FILES["file"]["tmp_name"], $USER_UPLOADS . $filename);
            }
            $logo = $filename;
            setError('Imagen subida');
        }
    } else {
        setError("Error archivo");
        return false;
    }
}

if ($_CONFIG['delete_old_files'] && !$logo) {
    $lifetime = $_CONFIG['file_lifetime'];
    deleteOldFiles($PNG_WEB_DIR, ($lifetime * 3600));
    deleteOldFiles($USER_UPLOADS, ($lifetime * 3600));
}

if ($logo) {
    $thumbsize = $_CONFIG['thumb_size'];
    $upthumb = makeThumb($USER_UPLOADS . $logo, $USER_UPLOADS . "thumb_" . pathinfo($logo, PATHINFO_FILENAME) . '.png', true, $thumbsize, $thumbsize);
    // print($upthumb);
}
