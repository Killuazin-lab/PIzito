CREATE TABLE usuario (
    id INT PRIMARY KEY IDENTITY,
    nome NVARCHAR(100),
    email NVARCHAR(100) UNIQUE,
    senha NVARCHAR(255),
    pontos INT DEFAULT 0
);