-- Criação da tabela de usuários
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    pontos INT DEFAULT 0
);

-- Criação da tabela de atividades (tarefas)
CREATE TABLE atividade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao VARCHAR(255),
    pontos INT NOT NULL
);

-- Relacionamento entre usuário e atividades feitas
CREATE TABLE atividade_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    atividade_id INT NOT NULL,
    concluida BOOLEAN DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (atividade_id) REFERENCES atividade(id)
);

-- Criação da tabela de recompensas
CREATE TABLE recompensa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao VARCHAR(255),
    pontos_necessarios INT NOT NULL
);

-- Relacionamento entre usuário e resgates feitos
CREATE TABLE resgate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    recompensa_id INT NOT NULL,
    data_resgate DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (recompensa_id) REFERENCES recompensa(id)
);
