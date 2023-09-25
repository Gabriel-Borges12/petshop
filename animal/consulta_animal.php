<?php
include '../conexao.php';

$sql = "SELECT * FROM animal";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='2'>";
    echo "<tr><th>Animal_Code</th><th>Tipo do Animal</th><th>Nome do Animal</th><th>Raça do Animal</th><th>Dono</th><th>Ações</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['animal_code'] . "</td>";
        echo "<td>" . $row['animal_tipo'] . "</td>";
        echo "<td>" . $row['animal_nome'] . "</td>";
        echo "<td>" . $row['animal_raca'] . "</td>";
        echo "<td>" . $row['fk_cliente_cpf'] . "</td>";
        echo "<td>";
        echo "<a href='edita_animal.php?id=" . $row['animal_code'] . "'>Editar</a> | ";
        echo "<a href='exclui_animal.php?id=" . $row['animal_code'] . "'>Apagar</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum animal cadastrado.";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista</title>
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




