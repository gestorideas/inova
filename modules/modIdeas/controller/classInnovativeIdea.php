<?php
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// Clase basica para la manipulacion de las ideas de la comunidad
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
include "../../../core/globals.php";
class innovativeIdea {

    //..........................................................................
    // Generar un identificador unico para cada idea
    //..........................................................................
    private function getUniqueId () {
        $valueReturn = md5 ( uniqid ( rand (), true ) );
    return $valueReturn;
    }
    //..........................................................................

    //..........................................................................
    // Crear una idea con base en los parametros recibidos del usuario
    //..........................................................................
    public function createIdea ( $idAuthor, $ideaTitle, $ideaDescription, $ideaTags ) {
        // Inicializa las variables y parametros
        $aDate      = date ( "d-m-Y H:i:s" );   // Fecha actual
        $anIdeaId   = $this->getUniqueId ();    // Id unico de la idea
        // Estructura los datos
        $anIdea     = array (
                        "ididea"        =>  $anIdeaId,
                        "author"        =>  strtolower   ( $idAuthor ),
                        "title"         =>  strtolower   ( $ideaTitle ),
                        "tags"          =>  [ strtolower ( $ideaTags ) ],
                        "description"   =>  strtolower   ( $ideaDescription ),
                        "date"          =>  $aDate,
                        "comments"      =>  []
                    );

        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Graba los datos
        $docIdeas->insert ( $anIdea );
        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................

    //..........................................................................
    // Obtener datos de una idea para su edicion o para mostrar sus detalles
    //..........................................................................
    public function getIdeaDetails ( $idIdea ) {
    $valueReturn = array();

        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Selecciona los datos
        $data               = $docIdeas->find ( array ( "ididea" => $idIdea ) );

        // Codifica los datos en formato JSON para su estructuracion en la interfaz
        $valueReturn = json_encode ( iterator_to_array ( $data ) );
        $connectionMongo->close (); // Cierra la conexion
    return $valueReturn;
    }
    //..........................................................................

    //..........................................................................
    // Actualizar / Editar una idea
    //..........................................................................
    public function updateIdea ( $idIdea, $ideaTitle, $ideaDescription, $ideaTags ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Actualiza los datos

        $toUpdate = array( "title" => $ideaTitle, "description" => $ideaDescription, "tags" => array ($ideaTags) );
        $docIdeas->update ( array ( "ididea" => $idIdea ),
            array ( '$set' => $toUpdate ) );
        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................

    //..........................................................................
    // Eliminar / Borrar una idea
    //..........................................................................
    public function deleteIdea ( $idIdea ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Elimina los datos
        $docIdeas->remove ( array ( "ididea" => $idIdea ) );
        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................

    //..........................................................................
    // Generar el listado de ideas de un autor
    //..........................................................................
    public function listIdeas ( $idAuthor ) {
    $valueReturn = array();

        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Selecciona los datos
        $data               = $docIdeas->find ( array ( "author" => $idAuthor ) );

        // Codifica los datos en formato JSON para su estructuracion en la interfaz
        $valueReturn = json_encode ( iterator_to_array ( $data ) );
        $connectionMongo->close (); // Cierra la conexion
    return $valueReturn;
    }
    //..........................................................................

    //..........................................................................
    // Generar el listado de todas las ideas del site menos las del autor en
    // sesion, ya que no se puede votar o comentar el mismo
    //..........................................................................
    public function listAllIdeas ( $idAuthor ) {
    $valueReturn = array();

        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Selecciona los datos
        $data               = $docIdeas->find ( array ( "author" => array ( '$ne' => $idAuthor ) ) );

        // Codifica los datos en formato JSON para su estructuracion en la interfaz
        $valueReturn = json_encode ( iterator_to_array ( $data ) );
        $connectionMongo->close (); // Cierra la conexion
    return $valueReturn;
    }
    //..........................................................................

    //..........................................................................
    // Agregar comentarios a una idea
    //..........................................................................
    public function addComment ( $idIdea, $idAuthor, $comments ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;
        $aDate              = date ( "d-m-Y H:i:s" );

        // Agrega el comentario
        $comment = array ( "comments" => array ( "commentedby" => $idAuthor, "comment" => $comments, "date" => $aDate ) );
        $docIdeas->update ( array ( "ididea" => $idIdea ), array ( '$push' => $comment ) );

        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................

    //..........................................................................
    // Sumar un voto a una idea
    //..........................................................................
    public function addVote ( $idIdea, $stars ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // Agrega el voto
        $docIdeas->update ( array ( "ididea" => $idIdea ), array ( '$inc' => array ( "votes" => $stars ) ) );
        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................

    //..........................................................................
    // Poner en venta una idea
    // flag = 0 No esta a la venta
    // flag = 1 Idea a la venta
    // flag = 2 Idea vendida
    //..........................................................................
    public function sellIdea ( $idIdea, $price ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        // db.ideas.update( { "ididea" : $idIdea }, { '$set' : { 'sold.flag' : 1 } } )

        $docIdeas->update ( array ( "ididea" => $idIdea ), array ( '$set' => array ( "sold.flag" => 1, "sold.price" => $price ) ) );
        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................

    //..........................................................................
    // Comprar una idea
    // flag = 0 No esta a la venta
    // flag = 1 Idea a la venta
    // flag = 2 Idea vendida
    //..........................................................................
    public function buyIdea ( $idIdea, $idBuyer, $name, $card_number, $payment_method, $security_code, $txtCommentEntrepreneur, $paypal_username ) {
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        $paymentDetails     = array (
            "name" => $name,
            "creditCard" => $card_number,
            "payment_method" => $payment_method,
            "security_code" => $security_code,
            "paypal_username" => $paypal_username,
            "txtCommentEntrepreneur" => $txtCommentEntrepreneur
        );
        $docIdeas->update ( array ( "ididea" => $idIdea ), array ( '$set' => array ( "sold.flag" => 2, "sold.idbuyer" => $idBuyer, "sold.info" => $paymentDetails ) ) );
        $connectionMongo->close (); // Cierra la conexion
    }
    //..........................................................................
    // Obtiene el correo de un autor vinculado a una idea
    //..........................................................................
    public function getMail ( $idAuthor ) {
    $valueReturn = array();

        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docUsers           = $mongoDB->users;

        // Selecciona los datos
        $data               = $docUsers->find ( array ( "_id" => $idAuthor ) );

        // Codifica los datos en formato JSON para su estructuracion en la interfaz
        $valueReturn = json_encode ( iterator_to_array ( $data ) );
        $data = json_decode ( $valueReturn );
        foreach ( $data as $field ) {
            $valueReturn = strtolower ( trim ( $field->email ) );
        }
        $connectionMongo->close (); // Cierra la conexion
    return $valueReturn;
    }

    //..........................................................................
    public function searchIdeas ( $search, $idAuthor ) {
    $valueReturn = array();
        // Establece la conexion a MongoDB
        $connectionMongo    = new MongoClient ( SERVER );
        $mongoDB            = $connectionMongo->selectDB ( DATABASE );
        $docIdeas           = $mongoDB->ideas;

        $unwind    = array ( '$unwind' => '$tags');
        $neAuthor  = array ( '$ne' => $idAuthor );
        $cond      = array ( "author" => $neAuthor, "tags" => array('$regex'=>$search, '$options' => "i") );
        $match     = array ( '$match' => $cond );
        $data               = $docIdeas->aggregate($unwind, $match);
        $connectionMongo->close (); // Cierra la conexion
    return $data;
   }

}
?>
