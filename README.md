
# 🎮 Marombas Guaraní

Este é um sistema interativo onde os usuários acumulam pontos ao realizar tarefas e visitar outros projetos. Ao atingir metas, podem trocar os pontos por recompensas, como sucos 🧃.

---

## 🚀 Tecnologias Utilizadas

- **Frontend**: HTML, CSS (tema gamificado), JavaScript
- **Backend**: PHP (conectado ao banco via PDO)
- **Banco de Dados**: Azure SQL Database
- **Extras (futuro)**: Integração com Python para relatórios

---

## 🧩 Funcionalidades

- 🔐 Cadastro e login de usuários
- 🎯 Realização de tarefas (ex: visitar projetos)
- 💰 Acúmulo de pontos por tarefa
- 🏆 Sistema de recompensas com metas desbloqueáveis
- 📊 Dashboard com progresso do usuário e tarefas concluídas
- 🍹 Pontuação pode ser trocada por sucos durante o evento

---

## 🖼️ Exemplo de uso

> Após o login, o usuário visualiza:
- Quantos pontos já acumulou
- Quais tarefas estão disponíveis
- Quais recompensas estão disponíveis
- Seu progresso atual para alcançar a próxima meta

---

## 📁 Estrutura de Pastas

```
project/
├── index.html              # Página inicial
├── login.php               # Tela de login
├── cadastro.php            # Tela de cadastro
├── dashboard.php           # Painel do usuário logado
├── includes/               # Conexão e autenticação
│   ├── conexao.php
│   └── auth.php
├── assets/
│   ├── css/
│   │   └── style.css       # Tema neon/gamificado
│   └── js/
│       └── main.js
└── sql/
    └── criar_tabelas.sql   # Scripts do banco
```

---

## ✨ Status do Projeto

- [x] Estrutura inicial montada
- [x] Sistema de login e cadastro funcional
- [x] Estilo gamificado com neon
- [ ] Integração com Azure SQL (em andamento)
- [ ] Sistema de tarefas e recompensas
- [ ] Resgate de recompensas com QR Code ou código

---

## 📅 Planejamento

| Data       | Tarefa                          |
|------------|----------------------------------|
| Até 10/04  | Conectar ao banco (Azure)        |
| Até 11/04  | Implementar tarefas e metas      |
| Até 12/04  | Finalizar resgate e interface    |

---

## 👨‍💻 Desenvolvido por

**Breno** — Estudante de Engenharia da Computação  
Projeto acadêmico para feira de apresentação com gamificação 💡
