<!DOCTYPE html>
<html lang="pt-br">
<!--
 * ============================================================
 *  DOCUMENTAÇÃO DO ARQUIVO
 * ============================================================
 *
 *  ARQUIVO         : lista_dados.php
 *  LOCALIZAÇÃO     : htdocs/AulaIoT/lista_dados.php
 *  PROJETO         : IoT com ESP32 – Listagem de Dados Recebidos
 *  DISCIPLINA      : Tópicos Especiais em Engenharia de Computação I
 *  PROFESSOR       : Prof. Jean A. A. Vieira
 *  INSTITUIÇÃO     : Unipinhal
 *  ANO             : 2026
 *
 * ------------------------------------------------------------
 *  DESCRIÇÃO
 * ------------------------------------------------------------
 *  Esta página exibe em uma tabela HTML, estilizada com
 *  Bootstrap 5, todos os registros armazenados na tabela
 *  tb_dados_recebidos do banco banco_iot.
 *
 *  A estrutura de conexão e SELECT segue o padrão ensinado
 *  em: https://www.w3schools.com/php/php_mysql_select.asp
 *
 * ------------------------------------------------------------
 *  BANCO DE DADOS
 * ------------------------------------------------------------
 *  Servidor : localhost
 *  Banco    : banco_iot
 *  Tabela   : tb_dados_recebidos
 *
 * ============================================================
-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IoT – Dados Recebidos</title>

    <!-- Bootstrap 5 CDN: framework CSS/JS para layout responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- ── Cabeçalho da página ──────────────────────────────── -->
<div class="container mt-5">
    <div class="card shadow-sm">

        <!-- Título do card -->
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📡 Dados Recebidos dos Dispositivos IoT</h4>
            <small>Banco: <strong>banco_iot</strong> | Tabela: <strong>tb_dados_recebidos</strong></small>
        </div>

        <div class="card-body">

<?php
// ── Configurações de conexão com o banco de dados ───────────
// Padrão W3Schools (php_mysql_select.asp)
$servername = "mysql-57"; // Connect to MySQL container by name (Docker internal network)
$username   = "root";      // Usuário do banco (padrão XAMPP)
$password   = "root";          // Senha do banco  (padrão XAMPP é vazia)
$dbname     = "banco_iot"; // Banco de dados que será consultado
$port       = 3306;        // MySQL inside its container listens on 3306

// ── Criação da conexão com o banco ──────────────────────────
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die('<div class="alert alert-danger">Falha na conexão: ' . $conn->connect_error . '</div>');
}

// ── Consulta SQL para buscar todos os registros ─────────────
// ORDER BY id DESC: exibe os registros mais recentes no topo
$sql    = "SELECT id, temperatura, humidade, local, mensagem, equipamento, dt_registro FROM tb_dados_recebidos ORDER BY id DESC";
$result = $conn->query($sql);

// Verifica se a consulta retornou pelo menos um registro
if ($result->num_rows > 0) {
?>
            <!-- Contador de registros encontrados -->
            <p class="text-muted mb-3">
                Total de registros encontrados: <strong><?php echo $result->num_rows; ?></strong>
            </p>

            <!-- Tabela responsiva com Bootstrap 5 -->
            <!-- table-striped: linhas alternadas | table-hover: destaque ao passar o mouse -->
            <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Temperatura (°C)</th>
                        <th>Humidade (%)</th>
                        <th>Local</th>
                        <th>Mensagem</th>
                        <th>Equipamento</th>
                        <th>Data/Hora Registro</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // ── Laço para exibir cada linha do resultado ─────────────
    // fetch_assoc() retorna cada linha como um array associativo
    // onde a chave é o nome da coluna.
    // Padrão W3Schools (php_mysql_select.asp): while($row = $result->fetch_assoc())
    while ($row = $result->fetch_assoc()) {
?>
                    <tr>
                        <!-- Exibe os valores de cada coluna da linha atual -->
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["temperatura"]; ?></td>
                        <td><?php echo $row["humidade"]; ?></td>
                        <td><?php echo $row["local"]; ?></td>
                        <td><?php echo $row["mensagem"]; ?></td>
                        <td>
                            <!-- Badge colorido para destacar o nome do equipamento -->
                            <span class="badge bg-secondary"><?php echo $row["equipamento"]; ?></span>
                        </td>
                        <td><?php echo $row["dt_registro"]; ?></td>
                    </tr>
<?php
    } // fim do while – todos os registros foram exibidos
?>
                </tbody>
            </table>
            </div>

<?php
} else {
    // Nenhum registro encontrado na tabela
    echo '<div class="alert alert-warning">Nenhum dado encontrado na tabela <strong>tb_dados_recebidos</strong>. Aguardando envio do ESP32...</div>';
}

// ── Encerra a conexão com o banco de dados ──────────────────
$conn->close();
?>

        </div><!-- /card-body -->

        <!-- Rodapé do card com link para atualizar a página -->
        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
            <span>Prof. Jean A. A. Vieira – Unipinhal 2026</span>
            <!-- Botão para recarregar a página e ver novos dados -->
            <a href="lista_dados.php" class="btn btn-sm btn-outline-primary">🔄 Atualizar</a>
        </div>

    </div><!-- /card -->
</div><!-- /container -->

<!-- Bootstrap 5 JS (necessário para componentes interativos do Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>