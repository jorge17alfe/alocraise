<?php

$_CONFIG = array(
    'lang' => 'en',                             // main language
    'uploads_dir' => 'temp',                    // uploads directory
    'qrcodes_dir' => 'qrcodes',                 // qr codes directory
    'delete_old_files' => true,                 // delete periodically old files
    'file_lifetime' => 24,                      // delete files older than..(hours) from /uploads_dir and /qrcodes_dir
    'uploader' => true,                         // let users upload their own logo
    'upload_max_filesize' => 1000,              // max filesize in Kb
    'thumb_size' => 130,                        // the size of the user's uploaded thumbnail 
    'qr_bgcolor' => '#FFFFFF',                  // default background color for generated qrcodes
    'qr_color' => '#000000',                    // default foreground color for generated qrcodes
    'placeholder' => "lib/generadorqr/images/placeholder.svg",  // default placeholder
    'link' => true,                             // activate link tab
    'default_tab' => '#link',                   // available options: #link | #location | #email | #text | #sms | #wifi | #vcard | #paypal | #bitcoin | #whatsapp
    'detect_browser_lang' => false,             // detect browser language
    'color_primary' => false,                   // main color, used for buttons and header background. set a #hex color or false to get random colors
    );
