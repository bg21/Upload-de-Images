<?php
    function imagemValida($img){
        https://www.php.net/manual/en/function.image-type-to-extension.php
        if($img['type'] == 'image/jpeg' || $img['type'] == 'image/png' || $img['type'] == 'image/jpg'){
            //Verificar o tamanho agora
            $tamanho = intval($img['size']/1024);
            if($tamanho < 300){
                return true;
            }else{
                //return false;
                echo 'Tamanho excedido. <br> *Tamanho máximo: 300KB.';
            }
            //é uma imagem
        }else{
            //return false;
            //não é uma imagem
            echo 'Informe um formato de imagem correto.<br> *Formatos permitidos: jpg, png e jpeg.';
        }
    }
    function uploadFile($file){
        $formatoArquivo = explode('.',$file['name']); //assim vc pega o nome do arquivo
        $nomeImagem = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1]; //vai gerar um id único
        if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$nomeImagem)){
            return $nomeImagem;
        }else{
            return false;
        }
    }
    
?>