<?php
class EnlacesPaguinas{
    public static function enlacesPaginasModel($enlacesModel){
        if( $enlacesModel == "Nosotros" || $enlacesModel == "Contactanos" || $enlacesModel == "Servicios"|| $enlacesModel == "Login"
        ||$enlacesModel=="Serviciosbootstrap"){
            $module = "Views/".$enlacesModel.".php";
        } else 
        {
            $module = "views/Inicio.php";
        }
        return $module;
    }
}
?>