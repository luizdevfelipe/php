<?php
/**
 * ============================================================
 *  DOCUMENTAÇÃO DO ARQUIVO
 * ============================================================
 *
 *  ARQUIVO         : recebe_dados.php
 *  LOCALIZAÇÃO     : htdocs/AulaIoT/recebe_dados.php
 *  PROJETO         : IoT com ESP32 – Recebimento de Dados via HTTP GET
 *  DISCIPLINA      : Tópicos Especiais em Engenharia de Computação I
 *  PROFESSOR       : Prof. Jean A. A. Vieira
 *  INSTITUIÇÃO     : Unipinhal
 *  ANO             : 2026
 *
 * ------------------------------------------------------------
 *  DESCRIÇÃO
 * ------------------------------------------------------------
 *  Esta página recebe os dados enviados pelo ESP32 via
 *  requisição HTTP GET, valida cada parâmetro recebido e
 *  insere o registro na tabela tb_dados_recebidos do banco
 *  de dados banco_iot.
 *
 *  A estrutura de conexão e INSERT segue o padrão ensinado
 *  em: https://www.w3schools.com/php/php_mysql_insert.asp
 *
 * ------------------------------------------------------------
 *  PARÂMETROS GET ESPERADOS NA URL
 * ------------------------------------------------------------
 *  Parâmetro    | Tipo    | Descrição
 *  -------------|---------|-----------------------------------
 *  temperatura  | numeric | Temperatura lida pelo sensor (°C)
 *  humidade     | numeric | Umidade relativa lida (%)
 *  local        | string  | Identificação do local do sensor
 *  mensagem     | string  | Comentário livre enviado pelo ESP32
 *  equipamento  | string  | ID único do dispositivo ESP32
 *
 *  Exemplo de URL:
 *  http://192.168.33.12/AulaIoT/recebe_dados.php
 *    ?temperatura=31&humidade=63&local=unipinhal-bloco-G
 *    &mensagem=Apenas%20um%20comentario&equipamento=ESP32-001
 *
 * ------------------------------------------------------------
 *  BANCO DE DADOS
 * ------------------------------------------------------------
 *  Servidor : localhost
 *  Banco    : banco_iot
 *  Tabela   : tb_dados_recebidos
 *  Usuário  : root  (padrão XAMPP – altere em produção)
 *  Senha    :       (vazia por padrão no XAMPP)
 *
 * ============================================================
 */

// ── Configurações de conexão com o banco de dados ───────────
// Siga o padrão do W3Schools (php_mysql_insert.asp)
$servername = "mysql-57"; // Endereço do servidor MySQL (XAMPP = localhost)
$username   = "root";      // Usuário do banco (padrão XAMPP)
$password   = "root";          // Senha do banco  (padrão XAMPP é vazia)
$dbname     = "banco_iot"; // Nome do banco de dados que receberá os dados
$port       = 3306;       // Porta padrão do MySQL (ajuste se necessário)

// ── Validação dos parâmetros recebidos via GET ──────────────
// isset() verifica se o parâmetro existe na URL.
// Caso algum parâmetro obrigatório esteja ausente, o script
// encerra com uma mensagem de erro para o ESP32.
if (
    !isset($_GET["temperatura"]) ||
    !isset($_GET["humidade"])    ||
    !isset($_GET["local"])       ||
    !isset($_GET["mensagem"])    ||
    !isset($_GET["equipamento"])
) {
    // Retorna mensagem de erro ao ESP32 e encerra o script
    die("ERRO: Parametros incompletos. Verifique a URL enviada pelo ESP32.");
}

// ── Sanitização e leitura dos parâmetros ────────────────────
// htmlspecialchars() converte caracteres especiais em entidades HTML,
// protegendo contra injeção de código HTML/JavaScript (XSS).
// trim() remove espaços em branco no início e no fim da string.
$temperatura = trim(htmlspecialchars($_GET["temperatura"]));
$humidade    = trim(htmlspecialchars($_GET["humidade"]));
$local       = trim(htmlspecialchars($_GET["local"]));
$mensagem    = trim(htmlspecialchars($_GET["mensagem"]));
$equipamento = trim(htmlspecialchars($_GET["equipamento"]));

// Validação adicional: temperatura e humidade devem ser numéricos
if (!is_numeric($temperatura)) {
    die("ERRO: O valor de temperatura nao e numerico.");
}
if (!is_numeric($humidade)) {
    die("ERRO: O valor de humidade nao e numerico.");
}

// ── Criação da conexão com o banco de dados ─────────────────
// Padrão W3Schools: new mysqli(servidor, usuario, senha, banco)
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexao: " . $conn->connect_error);
}

// ── Montagem e execução do comando SQL INSERT ────────────────
// Padrão W3Schools (php_mysql_insert.asp):
// $sql = "INSERT INTO tabela (col1, col2) VALUES ('val1', 'val2')";
//
// O campo dt_registro usa NOW() para gravar automaticamente
// a data e hora do recebimento no servidor.
$sql = "INSERT INTO tb_dados_recebidos (temperatura, humidade, local, mensagem, equipamento, dt_registro)
        VALUES ('$temperatura', '$humidade', '$local', '$mensagem', '$equipamento', NOW())";

// Executa o INSERT e verifica o resultado
if ($conn->query($sql) === TRUE) {
    // Retorna mensagem de sucesso ao ESP32 (exibida no Serial Monitor)
    echo "Registro inserido com sucesso!";
} else {
    // Retorna a mensagem de erro do MySQL ao ESP32
    echo "Erro ao inserir: " . $conn->error;
}

// ── Encerra a conexão com o banco de dados ──────────────────
// Boa prática: sempre fechar a conexão ao final do script
$conn->close();
?>