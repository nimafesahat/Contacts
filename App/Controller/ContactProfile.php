<?php

namespace App\Controller;

class ContactProfile
{

    public function checkFile()
    {
        $fileType = $_FILES['img']['type'];

        if($_FILES['img']['error'] != 4) {

            if (preg_match('/(image)\/(jpg|png|jpeg)/i', $fileType)) {
                return 1;
            } else {
                return 2; // "only JPG, JPEG, PNG files format is allowed.
            }
        }else{
            return 0;
        }
    }

    public function insert()
    {
        $checkFile = $this->checkFile();
        if ($checkFile == 1) {
            $fileType = substr($_FILES['img']['type'], 6);
            $fileName = time() . '.' . $fileType;
            move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . "/../../img/" . basename($_FILES["img"]["name"]));
            rename(__DIR__ . '/../../img/' . $_FILES['img']['name'], __DIR__ . '/../../img/' . $fileName);
            return $fileName;
        }elseif($checkFile == 0) {
            return "profile.png"; 
        }
    }

    public function destroy($imgName)
    {
        if($imgName != 'profile.png') {
        unlink(__DIR__ . '/../../img/' . $imgName);
        }
    }
}
