<?php

namespace Core;

class Config

{

    public static function File($path = null, $attributes = null)
{
    $target_path = __DIR__ . '/.././storage/' . $path;
    if (!file_exists($target_path)) {
        if (!mkdir($target_path, 0777, true) && !is_dir($path)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $path));
        }
    }

    $datetime = new \DateTime();
    $attributes['name'] = $datetime->getTimestamp() . basename($attributes['name']);
    $target_path = $target_path . basename($attributes['name']);
    if (move_uploaded_file($attributes['tmp_name'], $target_path)) {
        return $attributes['name'];
    } else {
        return false;
    }
}

    public static function Files($attributes = "", $path = null)
    {
        $total = count($attributes['name']);
        for ($i = 0; $i < $total; $i++) {
            //Get the temp file path
            $tmpFilePath = $attributes['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != "") {
                $name= rand(10,100).$attributes['name'][$i];
                $newFilePath = __DIR__ . '/.././storage/' . $path . $name;
                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    return $name;
                }
            }
        }
    }


    public function unlinkFile($path, $name)
    {
        $target_path = __DIR__ . '/.././storage/' . $path.$name;
        if (!unlink($target_path)) {
            echo "Not Working";
        }
        return true;
    }


}