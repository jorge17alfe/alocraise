<?php
class Images
{
    protected  $group;
    protected  $column_group;
    protected  $name_image;
    protected  $type_image;
    protected  $size_image;
    protected  $error_image;
    protected  $tpm_name_image;
    protected  $MAX_FILESIZE = 4096000;

    public function __construct($data)
    {
        $this->updateImages($data);
    }

    public  function updateImages($data)
    {
        $this->getValues($data);
        $this->divideImage($data->files);
    }

    public  function getvalues($data)
    {
        [$this->group, $this->columnWhere, $this->user] = descomposeArray($data->post);
    }
    public  function divideImage($files)
    {
        $res = array_keys($files[$this->group]['name']);
        $this->column_group = $res[0];
        $this->name_image = $files[$this->group]['name'][$this->column_group];
        $this->type = $files[$this->group]['type'][$this->column_group];
        $this->size_image = $files[$this->group]['size'][$this->column_group];
        $this->error_image = $files[$this->group]['error'][$this->column_group];
        $this->tmp_name_image = $files[$this->group]['tmp_name'][$this->column_group];
        $this->nameImage();
        $this->typeImage();
        $this->sizeImage();
        $this->errorImage();
        $this->tmp_nameImage();
    }

    public  function nameImage()
    {


        print_r($this->name_image);




        // exit();
        return;
    }
    public  function typeImage()
    {
        $allowedExts = array("gif", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG", "svg", "SVG");
        $temp = explode(".", $this->image_name);

        $extension = end($temp);
        if ((($this->image_type == "image/gif")
                || ($this->image_type == "image/jpeg")
                || ($this->image_type == "image/svg")
                || ($this->image_type == "image/jpg")
                || ($this->image_type == "image/pjpeg")
                || ($this->image_type == "image/x-png")
                || ($this->image_type == "image/png"))
            && in_array($extension, $allowedExts)
        ){

        }else {
            $msg = "Archivo no es una imagen";
        }
            print_r($this->type_image);
        echo '<br>';
        // exit();
        return;
    }
    public  function sizeImage()
    {

        $max_mb = round(($this->MAX_FILESIZE / 1024000), 2);
        $roundsize = round(($this->image_size / 1024000), 2);

            if ($this->image_size >= $this->MAX_FILESIZE) {
                $msg = "El archivo es muy grande  $roundsize  Mb (max:  $max_mb  Mb )";
            } else {
                return true;
            }
            
            
            if (isset($msg)) {
                return $msg;
            }

        // print_r($this->size_image);
        // echo '<br>';
        // // exit();
        return;
    }
    public  function tmp_nameImage()
    {

        print_r($this->tmp_name_image);
        echo '<br>';
        // exit();
        return;
    }
    public  function errorImage()
    {

        print_r($this->error_image);
        echo '<br>';
        // exit();
        return;
    }
    public  function deleteAll($ruta, $imagebd = null, $file_tmp, $imagenew, $count = null)
    {
        if (file_exists($ruta . $imagebd) && $count <= 1) {
            unlink($ruta . $imagebd);
            move_uploaded_file($file_tmp, $ruta . $imagenew);
        } else {
            move_uploaded_file($file_tmp, $ruta . $imagenew);
        }
        return;
    }


    public  function validateImages($data, $newname)
    {


        // exit();

        // $MAX_FILESIZE = 4096000;
        // $max_mb = round(($MAX_FILESIZE / 1024000), 2);
        // $allowedExts = array("gif", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG", "svg", "SVG");
        // $temp = explode(".", $data->image_name);

        // $extension = end($temp);


        // if ((($data->image_type == "image/gif")
        //         || ($data->image_type == "image/jpeg")
        //         || ($data->image_type == "image/svg")
        //         || ($data->image_type == "image/jpg")
        //         || ($data->image_type == "image/pjpeg")
        //         || ($data->image_type == "image/x-png")
        //         || ($data->image_type == "image/png"))
        //     && in_array($extension, $allowedExts)
        // ) {
        //     $roundsize = round(($data->image_size / 1024000), 2);

        //     if ($data->image_size >= $MAX_FILESIZE) {
        //         $msg = "El archivo es muy grande  $roundsize  Mb (max:  $max_mb  Mb )";
        //     } else {
        //         return true;
        //     }
        // } else {
        //     $msg = "Archivo no es una imagen";
        // }
        // if (isset($msg)) {
        //     return $msg;
        // }
    }
}
