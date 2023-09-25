<?php
include '../includes/conexao.php';

$sql = "SELECT * FROM cliente";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='2'>";
    echo "<tr><th>CPF Do Cliente</th><th>Nome do Cliente</th><th>Endereço do Cliente</th><th>Ações</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['cliente_cpf'] . "</td>";
        echo "<td>" . $row['cliente_nome'] . "</td>";
        echo "<td>" . $row['cliente_endereco'] . "</td>";
        echo "<td>";
        echo "<a href='edita_cliente.php?id=" . $row['cliente_cpf'] . "'>Editar</a> | ";
        echo "<a href='exclui_cliente.php?id=" . $row['cliente_cpf'] . "'>Apagar</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum cliente cadastrado.";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Consultar Clientes</title>
</head>
<body>
<header>
    <nav>
      <div class="nav-loty">
        <img src="../img/logo_petshop.png" alt="Logo Petshop" id="nav-logo">
        <span id="nav-title">Pet Tricolor</span>
      </div>
      <div class="nav-wrap">
        <input type="text" name="search-bar" id="search-bar">
        <ul class="nav-list">
          <li class="nav-link"><a href="./agendamento/consulta_agenda.php">Agendamentos</a></li>
          <li class="nav-link"><a href="../animal/consulta_animal.php">Animais</a></li>
          <li class="nav-link"><a href="../cliente/consulta_cliente.php">Clientes</a></li>
        </ul>
      </div>
    </nav>
  </header>

<button type="button" class="btn-volta"><a href="index.php">Voltar</a></button>
</body>
</html>
