-- ============================================================
--  SCRIPT SQL – CRIAÇÃO DO BANCO DE DADOS E TABELA
-- ============================================================
--
--  PROJETO      : IoT com ESP32 – Recebimento de Dados via HTTP GET
--  DISCIPLINA   : Tópicos Especiais em Engenharia de Computação I
--  PROFESSOR    : Prof. Jean A. A. Vieira
--  INSTITUIÇÃO  : Unipinhal
--  ANO          : 2026
--
-- ------------------------------------------------------------
--  COMO USAR
-- ------------------------------------------------------------
--  Opção 1 – phpMyAdmin (XAMPP):
--    1. Abra o navegador e acesse http://localhost/phpmyadmin
--    2. Clique na aba "SQL"
--    3. Cole este script na caixa de texto
--    4. Clique em "Executar"
--
--  Opção 2 – Linha de comando MySQL:
--    mysql -u root -p < banco_iot.sql
--
-- ------------------------------------------------------------
--  RESULTADO ESPERADO
-- ------------------------------------------------------------
--  - Banco de dados "banco_iot" criado (se não existir)
--  - Tabela "tb_dados_recebidos" criada com 7 colunas
--  - 2 registros de exemplo inseridos para teste
--
-- ============================================================


-- ── Criação do banco de dados ───────────────────────────────
-- IF NOT EXISTS: evita erro caso o banco já exista
CREATE DATABASE IF NOT EXISTS banco_iot
    CHARACTER SET utf8mb4       -- Suporte a emojis e caracteres especiais
    COLLATE utf8mb4_unicode_ci; -- Ordenação sem diferenciar maiúsculas/minúsculas

-- Seleciona o banco criado para as próximas operações
USE banco_iot;


-- ── Criação da tabela de dados recebidos ────────────────────
-- IF NOT EXISTS: evita erro caso a tabela já exista
CREATE TABLE IF NOT EXISTS tb_dados_recebidos (

    -- Chave primária com auto incremento (gerada automaticamente)
    id           INT(11)       NOT NULL AUTO_INCREMENT,

    -- Temperatura lida pelo sensor (permite valores decimais)
    temperatura  DECIMAL(5,2)  NOT NULL,

    -- Umidade relativa lida pelo sensor (permite valores decimais)
    humidade     DECIMAL(5,2)  NOT NULL,

    -- Local onde o sensor está instalado
    local        VARCHAR(100)  NOT NULL,

    -- Mensagem ou comentário livre enviado pelo ESP32
    mensagem     VARCHAR(255)  NOT NULL,

    -- Identificação única do dispositivo que enviou os dados
    equipamento  VARCHAR(50)   NOT NULL,

    -- Data e hora em que o servidor recebeu o registro
    -- Preenchida automaticamente com NOW() pelo PHP
    dt_registro  DATETIME      NOT NULL,

    -- Define a coluna "id" como chave primária da tabela
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ── Registros de exemplo para testar a listagem ─────────────
-- Estes inserts simulam dados que o ESP32 enviaria.
-- Podem ser removidos após verificar que tudo funciona.
INSERT INTO tb_dados_recebidos (temperatura, humidade, local, mensagem, equipamento, dt_registro)
VALUES
    (22.00, 14.00, 'unipinhal-bloco-G', 'Apenas um comentario', 'ESP32-001', NOW()),
    (28.50, 73.00, 'unipinhal-bloco-A', 'Teste de funcionamento', 'ESP32-002', NOW());


-- ── Consulta de verificação ──────────────────────────────────
-- Execute esta linha para confirmar que a tabela foi criada
-- e os registros de exemplo foram inseridos corretamente.
SELECT * FROM tb_dados_recebidos;