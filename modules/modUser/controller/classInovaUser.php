<?php
include "../../../core/globals.php";

class InovaUser {
//..........................................................................

    //..........................................................................
    // Login
    //..........................................................................
    public function validateUser ( $userName, $password ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docUsers           = $mongoDB->users;

        $query = array( "_id" => $userName );
        $options = array( "password" => 1 );
        $users = $docUsers->find ( $query , $options);
        if ( $users->count() > 0 ){
            foreach ($users as $aUser){
            }

            if(crypt($password, $aUser["password"]) == $aUser["password"]) {
                $options = array( "password" => 0 );
                $users   = $docUsers->find ( $query , $options);
                $valueReturn = json_encode ( iterator_to_array ( $users ) );
            }else{
                $valueReturn = -1;
            }
        }else{
            $valueReturn = 0;
        }

        $connectionMongo->close (); // Cierra la conexion
    return $valueReturn;
    }
    //..........................................................................

    //..........................................................................
    // Crear una usuario
    //..........................................................................
    public function addUser ( $userName, $name, $lastName_1, $lastName_2, $email, $userTags , $password) {
        // Inicializa las variables y parametros
        $valueReturn = 0;
        $aDate        = date ( "d-m-Y H:i:s" );   // Fecha actual
        // Estructura los datos
        echo $password;
        $hashPassword = crypt( $password );
        echo $hashPassword;
        $aUser        = array (
            "_id"           =>  strtolower   ( $userName ),
            "password"      =>  $hashPassword,
            "name"          =>  strtolower   ( $name ),
            "last_name_1"   =>  strtolower   ( $lastName_1 ),
            "last_name_2"   =>  strtolower   ( $lastName_2 ),
            "email"         =>  strtolower   ( $email ),
            "tags"          =>  [ strtolower ( $userTags ) ],
            "date"          =>  $aDate,
        );

        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docUsers           = $mongoDB->users;

        try {
            $docUsers->insert ( $aUser );
        }
        catch (MongoCursorException $e) {
            if ($e->getCode()==11000){
                $valueReturn = -1;
                echo "El usuario ya existe"."\n";
            }
        }


        // Graba los datos

        $connectionMongo->close (); // Cierra la conexion
        return $valueReturn;
    }


}