<?php
    namespace Controller;
    require "models/Cervezas.php";
    use Models\Cervezas;

    class CervezasController{

        function __construct(){
            
            require "vistas/index.php";
        }

        function index(){
            $cervezas = Cervezas::all();
            require "vistas/galeria.php";
        }
        function show($args){
           $id = (int)$args[0];
           $cerveza = Cervezas::find($id);
           require "vistas/show.php";
        }

        public function create(){
            require 'vistas/agregar.php';
        }
        
        public function store(){
            $cerveza = new Cervezas();
            $cerveza->Nombre = $_REQUEST['nombre'];
            $nombre = $_REQUEST['nombre'];
            $cerveza->Tipo = $_REQUEST['tipo'];
            $cerveza->Graduacion_alcoholica = $_REQUEST['graduacion'];
            $cerveza->Pais = $_REQUEST['pais'];
            $cerveza->Precio = $_REQUEST['precio'];

                $carpetaDir = "fotos/";
                $carpetaDirFile = $carpetaDir. basename($_FILES["ruta"]["name"]);
                if(move_uploaded_file($_FILES["ruta"]["tmp_name"], $carpetaDirFile)){
                    $cerveza->Ruta_imagen_asociada_a_la_cerveza = $carpetaDirFile;
                }

                $carpetaDirF = "beer_desc/";
            
                $nuevoNombre = $nombre.".pdf";
                $carpetaDirFileF = $carpetaDirF. $nuevoNombre;
                if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $carpetaDirFileF)){
                    $cerveza->Fichero = $carpetaDirFileF;
                }
            $cerveza->insert();
            header('Location:index.php?url=cervezas');
        }

        function edit($args){
            $id = (int)$args[0];
            $cerveza = Cervezas::find($id);
            require "vistas/edit.php";
        }

        public function update(){
            $cerveza = new Cervezas();
            $id = $_REQUEST['id'];
            $cerveza2 = Cervezas::find($id);
            $ruta = $cerveza2->Ruta_imagen_asociada_a_la_cerveza;
            $nombre = $cerveza2->Nombre;
            if(file_exists($ruta)){
                unlink($ruta);
            }
           
            $cerveza->Identificador = $_REQUEST['id'];
            $cerveza->Nombre = $_REQUEST['nombre'];
            $nombre2 = $_REQUEST['nombre'];
            $cerveza->Tipo = $_REQUEST['tipo'];
            $cerveza->Graduacion_alcoholica = $_REQUEST['graduacion'];
            $cerveza->Pais = $_REQUEST['pais'];
            $cerveza->Precio = $_REQUEST['precio'];
            $cerveza->Ruta_imagen_asociada_a_la_cerveza = $_REQUEST['ruta'];

            $carpetaDir = "fotos/";
            $carpetaDirFile = $carpetaDir. basename($_FILES["ruta"]["name"]);
                if(move_uploaded_file($_FILES["ruta"]["tmp_name"], $carpetaDirFile)){
                    $cerveza->Ruta_imagen_asociada_a_la_cerveza = $carpetaDirFile;
                }

                if(isset($_FILES["fichero"]) && !empty($_FILES["fichero"]["name"])) {
                    $carpetaDesc = "beer_desc/";
                    $nuevoNombrePDF = $nombre.".pdf";
                    $rutaPDFNueva = $carpetaDesc . $nuevoNombrePDF;
            
                    if(file_exists($rutaPDFNueva)){
                        unlink($rutaPDFNueva);
                    }
                    move_uploaded_file($_FILES["fichero"]["tmp_name"], $rutaPDFNueva);
                }

            /*
            if($nombre !== $nombre2){
                $carpetaDirF = "beer_desc/";
                $nuevoNombre = $nombre.".pdf";
                $carpetaDirFileF = $carpetaDirF. $nuevoNombre;
                if(file_exists($carpetaDirFileF)){
                    unlink($carpetaDirFileF);
                }
                $nuevoNombre2 = $nombre2.".pdf";
                $carpetaDirFileF2 = $carpetaDirF. $nuevoNombre2;
                move_uploaded_file($_FILES["fichero"]["tmp_name"], $carpetaDirFileF2);
            }
            if(isset($_REQUEST['fichero']) && !empty($_REQUEST['fichero'])) {
                $fichero = $_REQUEST['fichero'];
                if($nombre !== $nombre2){
                    $carpetaDirF = "beer_desc/";
                    $nuevoNombre = $nombre.".pdf";
                    $carpetaDirFileF = $carpetaDirF. $nuevoNombre;
                    if(file_exists($carpetaDirFileF)){
                        unlink($carpetaDirFileF);
                    }
                    $nuevoNombre2 = $nombre2.".pdf";
                    $carpetaDirFileF2 = $carpetaDirF. $nuevoNombre2;
                    move_uploaded_file($_FILES["fichero"]["tmp_name"], $carpetaDirFileF2);
                }else{
                    $carpetaDirF = "beer_desc/";
                    $nuevoNombre = $nombre2.".pdf";
                    $carpetaDirFileF = $carpetaDirF. $nuevoNombre;
                    move_uploaded_file($_FILES["fichero"]["tmp_name"], $carpetaDirFileF);
                }
                 
            }*/
                
            $cerveza->save();

            header('Location:index.php?url=cervezas');
        }

        public function delete($args){
            $id = (int) $args[0];
            $cerveza = Cervezas::find($id);

            $nombre = $cerveza->Nombre;
            
            $rutaFicheroFoto = $cerveza->Ruta_imagen_asociada_a_la_cerveza;

            $rutaFicheroFichero = "beer_desc/". $nombre . ".pdf";

            unlink($rutaFicheroFoto);
            unlink($rutaFicheroFichero);
            $cerveza->delete($id);
            header('Location:index.php?url=cervezas');
        }
       
        
    }
?>