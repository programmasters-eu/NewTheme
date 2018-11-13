<?php

/**
 * La funcionalidad específica de administración del theme.
 *
 * @link       https://newtheme.eu
 * @since      1.0.0
 *
 * @package    theme_name
 * @subpackage theme_name/admin
 */

/**
 * Define el nombre del theme y la versión, esta clase es fundamental para  crear tablas personalizadas
 * del thema, crearemos bases de datos para aplicaciones del frontend
 * 
 * @since      1.0.0
 * @package    ATR THEME
 * @subpackage ATR THEME/admin
 * @author     Jhon J.R <info@newtheme.eu>
 * 
 * @property string $theme_name
 * @property string $version
 */

class ATR_DB_Public{


    public function atr_form_contact_db(){

        /**
         * Funcionamiento :
         * al cargar por primera vez esta tabla, la version sera la 1.0
         * si hacemos alguna modificacion solo debemos cambiar la version, de 1.0 a 1.1 por ejemplo
         * y modificaremos la tabla de mas abajo, dentro del condicional if
         * 
         */

        /**
         * PASO 1 : Crear Tabla version 1.0
         * https://codex.wordpress.org/Creating_Tables_with_Plugins
         * global $wpdb, wordpress data base me permite hacer consultas sql a la BBDD
         * global $DBversion_contact; con esto creo una version para la tabla que voy a crear, en caso de actualizar o modificar
         * $DBversion_contact = '1.0'; esta es la version para este theme
         * $tabla = $wpdb->prefix . 'contactme'; este sera el nombre de la tabla
         * $charset_collate= $wpdb->get_charset_collate(); este es el set charset de wordpress
         * $sql, es la consulta, junto con el $charset_collate
         * require_once(ABSPATH), ESTA ES LA RUTA ABSOLUTA QUE DEFINE WORDPRESS
         * 'wp_admin/includes/upgrade.php' esto nos comunica con el archivo de wordpress que maneja las tablas
         * dbDelta($sql); esta funcion se encuentra dentro del archivo upgrade.php
         * dbDelta($sql); examina la estructura de tabla actual, la compara con la estructura de tabla deseada y agrega o modifica 
         * la tabla según sea necesario, por lo que puede ser muy útil para las actualizaciones
         * add_option('newtheme_db_version', $DB_version_contact); esto me crea una api_option, con la llave 'newtheme_db_version'
         */
        global $wpdb;
        global $DB_version_contact;
        $DB_version_contact = '1.0';

        $tabla = $wpdb->prefix . 'contactme';
        $charset_collate= $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $tabla (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            nombre varchar(70) NOT NULL,
            correo varchar(100) NOT NULL,
            mensaje longtext NOT NULL,
            PRIMARY KEY(id)
        ) $charset_collate; ";

        require_once ( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
        add_option('newtheme_db_version', $DB_version_contact);

        /**
         * PASO 2 : Actualizar Tabla
         * Actualizar DB_version
         * con el codigo que escribiremos aqui podremos actualizar la BBDD en cualquier momento
         * Agregar campos, eliminar campos, actualizar
         */
        $version_actual = get_option('newtheme_db_version');

        if( $DB_version_contact != $version_actual ){

            //Nombre de la tabla
            $tabla = $wpdb->prefix . 'contactme';

            $charset_collate= $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $tabla (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                nombre varchar(70) NOT NULL,
                correo varchar(100) NOT NULL,
                mensaje longtext NOT NULL,
                PRIMARY KEY(id)
            ) $charset_collate; ";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            add_option('newtheme_db_version', $DB_version_contact);
        
        }


    }

    public function atr_form_contactme_newtheme_db_revisar(){
        /**
         * Esta funcion revisa las tablas creadas para el formulario contactme para la funcion atr_form_contact_db()
         */
        global $$DB_version_contact;
        if ( get_site_option('newtheme_db_version') != $DB_version_contact ){

            //esta es la funcion callback con la que creo  las tablas en el paso 1
            atr_form_contact_db();
        }
        
    }


    public function atr_save_form_contactme(){
        /**
         * esta funcion almacena en la BBDD los datos delm formulario contactme
         */
        global $wpdb;

        if (isset($_POST['enviar']) ):

            if( $_POST['name']==null && $_POST['name']==null && $_POST['name']==null ):

                $message = "
                <div class='container'>
                    <div class='row submit-message'>
                        <p>Por favor Rellene los campos del formulario</p>
                    </div>
                </div>";
                //echo $message;

            elseif( $_POST['name']!=null && $_POST['name']!=null && $_POST['name']!=null && $_POST['oculto'] == "1" ):

                $name     = sanitize_text_field( $_POST['name'] );
                $email      = sanitize_text_field( $_POST['email'] );
                $message    = sanitize_text_field( $_POST['message'] );

                //Paso 1 : Tabla
                $tabla = $wpdb->prefix . 'contactme';

                //Paso 2 : Datos
                //aqui pondremos el nombre de las columnas y los datos a insertar
                $datos = array(
                    'nombre' => $name,
                    'correo' => $email,
                    'mensaje' => $message

                );

                //Paso 3 : Formato s=string, d=para numeros f=flotante, numeros con decimales por ejempo(3.50, 0.0003, etc)
                $formato =array(
                    '%s',
                    '%s',
                    '%s'
                );

                //Paso 4 : realizamos la consulta
                $wpdb->insert( $tabla, $datos, $formato );

                    //Paso 5 envio de correo, aqui utilizaremos la funcion wp_mail();
                    $to = get_option('admin_email');
                    $subject = $email;
                    $headers = array('Content-Type: text/html; charset=UTF-8', 'From : $to <$subject>');
    
                    wp_mail($to, 'nuevo mensaje', $message);

                //Paso 6 :
                // redireccionamos, crearemos una pagina nueva en el cpanel, la llamaremos(message);
                $url        = get_page_by_title('message');
                $location   = get_permalink($url->ID);

                //wp_safe_redirect( $location, $status ); esta funcion siempre va acompañada de un exit();
                wp_redirect($location);
        
                exit();

            endif;

        endif;
    
    }
    
    /**
     * Funcion para eliminar registros de DB form la BBDD
     */
    public function dbform_eliminar(){
        
        /**
         * Para comprobar la conexion con el ajax escribiremos die(json_encode($_POST))
         */
        if(isset($_POST['tipo'])){
            if($_POST['tipo']=='eliminar'){

                global $wpdb;
                $tabla = $wpdb->prefix . 'contactme';

                $id_registro = $_POST['id'];

                /**
                 * La funcion $wpdb->delete(); RECIBE 3 parametros
                 * 1. la tabla
                 * 2. el where
                 * 3. el tipo de dato, para numero d, paradecimal f, para string s
                 * Nota: esta funcion devuelve 1 si se elimina el registro
                 */
                $resultado = $wpdb->delete( $tabla, array( 'id' => $id_registro ), array('%d') );

                if ( $resultado == 1 ){
                    $respuesta = array(
                        'respuesta' => 1,
                        'id' => $id_registro
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }

            }
        }

        die( json_encode($respuesta) );
    }


}

