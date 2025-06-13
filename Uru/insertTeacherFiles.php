<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_FILES['diplomas']) && $_FILES['diplomas']['error'] == 0) {
    $diretorio_destino = '../Uploads/diplomas/';
    $nome_original = $_FILES['diplomas']['name'];
    $nome_temporario = $_FILES['diplomas']['tmp_name'];
    $tamanho_arquivo = $_FILES['diplomas']['size'];
    $tipo_arquivo = $_FILES['diplomas']['type'];

    // Validação de tamanho (exemplo)
    $tamanho_maximo = 50000000; // 50MB
    if ($tamanho_arquivo > $tamanho_maximo) {
      echo "Tamanho máximo permitido excedido.";
      exit;
    }

    // Mover o arquivo
    if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_original)) {
      echo "Upload realizado com sucesso!";
    } else {
      echo "Erro ao mover o arquivo.";
    }
  } else {
    echo "Erro no upload.";
  }
}



?>