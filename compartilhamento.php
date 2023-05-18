<!-- <?php
session_start();

$localhost = "localhost";
$dbname = "usuarios";
$dbusername = "root";
$dbpassword = "";

// Conectar ao banco de dados
$pdo = new PDO("mysql:host=$localhost;dbname=$dbname", $dbusername, $dbpassword);

// Verificar a conexão
if (!$pdo) {
  echo "Falha ao conectar ao MySQL";
  exit();
}

// Consultar o banco de dados para obter a lista de usuários
$sql = $pdo->prepare('SELECT id, nome FROM usuarios;');
$sql->execute();
$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

// Consultar o banco de dados para obter a lista de documentos
$sql = $pdo->prepare('SELECT id_arquivo, nome FROM arquivos;');
$sql->execute();
$documentos = $sql->fetchAll(PDO::FETCH_ASSOC);

// Obter o ID do usuário logado
$idUsuario = $_GET['id'] ?? false;

// Verificar se o formulário foi enviado
if (isset($_POST['usuario']) && isset($_POST['id_arquivo'])) {
  // Obter o usuário selecionado
  $idUsuarioDestino = $_POST['usuario'];

  // Obter o documento selecionado
  $idArquivo = $_POST['id_arquivo'];

  // Verificar se o documento existe
  $documentoExists = false;
  foreach ($documentos as $documento) {
    if ($documento['idDocumento'] == $idDocumento) {
      $documentoExists = true;
      break;
    }
  }

  if ($documentoExists) {
    // Inserir o documento na tabela de compartilhamentos
    $sql = $pdo->prepare('INSERT INTO arquivos_has_usuarios (id_usuario, id_arquivo) VALUES (?, ?)');
    $sql->execute([$idUsuarioDestino, $idDocumento]);

    // Redirecionar para a página de compartilhamentos
    header('Location: usuarios.php');
    exit();
  } else {
    echo "Documento inválido. Por favor, selecione um documento válido.";
  }
}

// Exibir o formulário
echo "<form action='#' method='POST' enctype='multipart/form-data'>";
echo" <input type='hidden' name='idDocumento' value='$idDocumentoo'> ";
echo "<label>Selecione um usuário:</label>";
echo "<select name='usuario' >";
foreach ($usuarios as $usuario) {
  if ($usuario['idUsuario'] != $idUsuario) {
    echo "<option value='" . $usuario['idUsuario'] . "'>" . $usuario['nome'] . "</option>";
  }
}
echo "</select>";
echo "<br><br>";
echo "<input type='submit' value='Compartilhar'>";
echo "</form>";

// Fechar a conexão
$pdo = null;
?>
arquivoscompartilhados:  <?php


require('verifica_login.php');
require('twig_carregar.php');
require('pdo.inc.php');
require('models/Model.php');
require('models/Usuario.php');

$comp = new Usuario();
$compartilha = $comp->getcompartilha();


echo $twig->render('arquivoscompartilhados.html');


// Verificar a conexão
if (!$pdo) {
  echo "Falha ao conectar ao MySQL";
  exit();
}

// Obter o ID do usuário logado
$idUsuario = $_SESSION['id'];

// Consultar o banco de dados para obter a lista de arquivos compartilhados
$sql = $pdo->prepare('SELECT c.arquivos_id, d.caminho as caminhoArquivo, d.nome AS nomeArquivo, u.nome AS nomeUsuario
FROM compartilhamentos c
INNER JOIN documentos d
ON c.idDocumento = d.idDocumento
INNER JOIN usuarios u
ON d.idUsuario = u.idUsuario
WHERE c.idUsuario = ? and d.caminho = c.caminho
ORDER BY c.idCompartilhamento DESC');
$sql->execute([$idUsuario]);
$compartilhamentos = $sql->fetchAll(PDO::FETCH_ASSOC);
// Exibir a lista de arquivos compartilhados

echo "<ul>";
foreach ($compartilhamentos as $compartilhamento) {
  echo "<li><a href='arquivo/" . $compartilhamento['caminhoArquivo'] . "' download>" . $compartilhamento['nomeArquivo'] . "</a> (Compartilhado por: " . $compartilhamento['nomeUsuario'] . ")</li>";
}
echo "</ul>";

// Fechar a conexão
$pdo = null; -->

?>

 
