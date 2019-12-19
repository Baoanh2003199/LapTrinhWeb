<?php
  class Format{

    public function formatDate($date){
      return date('F,j,Y,g:i a',strtotime($date));
    }

    public function textShorten($text,$limit=50){
      $text=$text." ";
      $text=substr($text,0,$limit);
      $text=$text."....";

      return $text;
    }

    public function valation($data){
      $data=trim($data);
      $data=stripcslashes($data);
      $data=htmlspecialchars($data);

      return $data;
    }

    public function title(){
      $path=$_SERVER['SCRIPT_NAME'];
      $tilte=basename($path,'.php');

      if ($tilte=='index'){
        $tilte='home';
      }elseif ($tilte=='contact') {
        $tilte='contact';
      }
      return $tilte=ucfirst($tilte);
    }
  }
?>
