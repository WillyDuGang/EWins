<?php

namespace src\lib\util;

class Image
{
    public static function cropImageToSquare($imagePath, $newPath) {
        $im = imagecreatefrompng($imagePath);
        $size = min(imagesx($im), imagesy($im));
        $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
        if ($im2 !== false) {
            imagepng($im2, $newPath);
            imagedestroy($im2);
        }
        imagedestroy($im);
    }
}