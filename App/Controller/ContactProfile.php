<?php 

namespace MyApp\Controller;

class ContactProfile
{

    public function checkFile()
    {
        $fileType = $_FILES['img']['type'];

        if(preg_match('/(image)\/(jpg|png|jpeg)/i',$fileType)){
            return 1;
        }else{
            echo "only JPG, JPEG, PNG files format is allowed.";
        }
    }

    public function insert()
    {
        $checkFile = $this->checkFile();
        if($checkFile == 1){
            $fileType = substr($_FILES['img']['type'],6);
            $fileName = time().'.'.$fileType;
            move_uploaded_file($_FILES['img']['tmp_name'] , __DIR__ . "/../../img/" . basename($_FILES["img"]["name"]));
            rename(__DIR__.'/../../img/'. $_FILES['img']['name'],__DIR__.'/../../img/' . $fileName);
            return $fileName;
        }
    }

    public function destroy($imgName)
    {
        unlink(__DIR__ . '/../../img/'.$imgName);
    }
}