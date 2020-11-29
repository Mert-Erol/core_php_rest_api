<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,
            Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    $database = new Database();
    $db = $database->connect();

    $post = new POST($db);

    //Gönderilen veriyi alıyoruz
    $data = json_decode(file_get_contents("php://input"));

    $post->id = $data->id;


    if($post->delete()){
        echo json_encode([
            'message' => 'Post Deleted'
        ]);
    }
    else{
        echo json_encode([
            'message' => 'Post Not Deleted'
        ]);
    }