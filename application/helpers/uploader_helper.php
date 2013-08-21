<?php
include(APPPATH."/helpers/class.upload.php");

function resize_image($source, $output, $width = 100, $height = 100){

    $handle = new Upload($source);


    list($img_width, $img_height) = getimagesize($source);
    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if($handle->uploaded && $img_width > $width && $img_height >  $height ){

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
        $handle->image_resize            = true;
        //$handle->image_ratio_y           = true;
        $handle->image_x                 = $width;
        $handle->image_y                 = $height;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->Process($output);

        return $handle->file_dst_name;

    }elseif($handle->uploaded){

        $handle->Process($output);
        return $handle->file_dst_name;

    }


           /* if ($handle->processed) {
                // everything was fine !
                echo '<p class="result">';
                echo '  <b>File uploaded with success</b><br />';
                echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
                $info = getimagesize($handle->file_dst_pathname);
                echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
                echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' -  ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
                echo '</p>';
            } else {
                // one error occured
                echo '<p class="result">';
                echo '  <b>File not uploaded to the wanted location</b><br />';
                echo '  Error: ' . $handle->error . '';
                echo '</p>';
            }*/


}

function crop_image($source, $output,$width = 100, $height = 100){

    if(!@file_exists($source)){
        return false;
    }
    if (!@is_writable(dirname($output))) {
        return false;
    }

    $thumb = PhpThumbFactory::create($source);
    $thumb->cropFromCenter($width,$height);
    $thumb->save($output);

    if(!@file_exists($output)){
        return false;
    }
    return true;
}