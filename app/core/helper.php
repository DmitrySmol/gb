<?php
function baseUrl()
{
    return BASE_URL;
}

function redirect($url)
{
	header('Location: ' . $url);
	exit;
}

function clean($str)
{
	return htmlspecialchars(strip_tags(trim($str)));
}

function cleanData($data = [])
{
    foreach ($data as $key => $value) {
        $data[$key] = clean($value);
    }

    return $data;
}

function isAuthorized()
{
    if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        return false;
    }
    $user = $_SESSION['user'];
    if (!isset($_COOKIE['authHash']) || $user['authHash'] !== $_COOKIE['authHash']) {
        return false;
    }
    return true;
}

function setValue($fieldName, $default)
{
    if ( isset($_POST[$fieldName]) && !empty($_POST[$fieldName]) ) {
        return $_POST[$fieldName];
    }

    if ( isset($default) ) {
        return $default;
    }

    return '';
}

function upload($data, $picture_name)
{
    $maxDim = 320;
    $maxDimH = 240;
    $file_name = $data['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize( $file_name );
    if ( $width > $maxDim || $height > $maxDim ) {
        $target_filename = $file_name;
        $ratio = $width/$height;
        if( $ratio > 1) {
            $new_width = $maxDim;
            $new_height = $maxDim/$ratio;
        } else {
            $new_height = $maxDimH;
            $new_width = $maxDimH*$ratio;
        }
        $src = imagecreatefromstring( file_get_contents( $file_name ) );
        $dst = imagecreatetruecolor( $new_width, $new_height );
        imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
        imagedestroy( $src );
        imagepng( $dst, $target_filename ); // adjust format as needed
        imagedestroy( $dst );
    }
    if(!move_uploaded_file($data['tmp_name'], ROOT . "/pub/images/" . $picture_name )) {
        return false;
    }
    return true;
}
