<?php
// si el seleccionador no está vacio
if(!empty($_GET['file'])){
    // adoptando el nombre del archiv originla en el server
    $fileName = basename($_GET['file']);
    // definiend path de dondé estará el archivo
    $filePath = 'files/'.$fileName;
    // validando que el archivo exista
    if(!empty($fileName) && file_exists($filePath)){
        // Definiendo los headers
        header("Cache-Control: public"); // que sea publico
        header("Content-Description: File Transfer"); //ftp
        header("Content-Disposition: attachment; filename=$fileName"); // archivo adjunto y nombre
        header("Content-Type: application/zip"); // tipo de aplicación
        header("Content-Transfer-Encoding: binary");
        
        //Leyendo el archivo
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}