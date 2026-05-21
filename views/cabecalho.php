<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contatos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: white;
            color: black;
            transition: 0.3s;
        }

        body.dark {
            background-color: #1e1e1e;
            color: white;
        }

        nav {
            background-color: #0077cc;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav button {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .container {
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }

        body.dark table {
            background-color: #2c2c2c;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        body.dark th {
            background-color: #444;

        }

        .btn-novo {
    display: inline-block;
    background-color: #0077cc;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-novo:hover {
    background-color: #005fa3;
    transform: scale(1.03);
}

body.dark .btn-novo {
    background-color: #3399ff;
    color: white;
}

body.dark .btn-novo:hover {
    background-color: #1f7ed0;
}

.form-container {
    max-width: 500px;
    background-color: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

body.dark .form-container {
    background-color: #2c2c2c;
}

.form-container h2 {
    margin-top: 0;
    color: #0077cc;
}

body.dark .form-container h2 {
    color: #66b3ff;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    box-sizing: border-box;
}

body.dark .form-group input {
    background-color: #444;
    color: white;
    border: 1px solid #666;
}

.btn-cadastrar {
    background-color: #0077cc;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.btn-cadastrar:hover {
    background-color: #005fa3;
    transform: scale(1.03);
}

body.dark .btn-cadastrar {
    background-color: #3399ff;
}

body.dark .btn-cadastrar:hover {
    background-color: #1f7ed0;
}

.erro {
    color: red;
    margin-bottom: 15px;
    font-weight: bold;
}

.btn-editar,
.btn-excluir {
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: 0.3s;
}

.btn-editar {
    background-color: #28a745;
}

.btn-editar:hover {
    background-color: #1f7d35;
}

.btn-excluir {
    background-color: #dc3545;
}

.btn-excluir:hover {
    background-color: #b02a37;
}
.menu-links {
    display: flex;
    gap: 15px;
    align-items: center;
}

.menu-links a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.menu-links a:hover {
    opacity: 0.7;
}

.btn-voltar {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #0077cc;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-voltar:hover {
    background-color:rgb(22, 88, 150);
    transform: scale(1.03);
}

body.dark .btn-voltar {
    background-color: #888;
}

body.dark .btn-voltar:hover {
    background-color: #666;
}

        footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #0077cc;
        color: white;
        text-align: center;
        padding: 15px;
    }
    </style>
</head>

<body>

<nav>

    <h2>Sistema Agenda</h2>

    <div class="menu-links">

        <a href="index.php">Contatos</a>

        <a href="clientes.php">Clientes</a>

        <a href="produtos.php">Produtos</a>

    </div>

    <button onclick="alternarModo()">
        escuro/claro
    </button>

</nav>
<div class="container">

<script>
    function alternarModo() {
        document.body.classList.toggle("dark");
    }
</script>