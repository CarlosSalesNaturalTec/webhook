<?php

  $method = $_SERVER['REQUEST_METHOD'];
  
  if ($method == "POST"){
      $requestBody = file_get_contents('php://input');
      $json = json_decode($requestBody);

      $text = $json->queryResult->parameters->materias;
      
      switch($text){
          case "matematica":
              $Speech = "Qual o resultado de: 2 mais 2 ?";
              break;
              
          case "historia":
              $Speech = "Quem descobriu o Brasil";
              break;
              
          case "portugues":
              $Speech = "Informe qual o verbo na seguinte frase: Carlos gosta de Estudar";
              break;   
          default: 
              $Speech = "Matéria Indisponível";
              break;
      }
      
      $response = new \stdClass();
      $response->fulfillmentText = $Speech;
      $response->source = "webhookHeroku";

      echo json_encode($response);

  }
  else {

      echo "metodo nao permitido";
  }
  
?>
