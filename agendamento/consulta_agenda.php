<?php
include '../conexao.php';

$sql = "SELECT * FROM agendamentos
JOIN animal
  ON agendamentos.fk_animal_code = animal.animal_code
JOIN cliente
  ON agendamentos.fk_cliente_cpf = cliente.cliente_cpf";
$resultado = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>PetTricolor - Lista</title>
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
  <div class="content-table">
    <?php
    if ($resultado->num_rows > 0) {
      echo "<table border='2'>";
      echo "<tr><th>Procedimento</th><th>Data</th><th>Nome do Animal</th><th>Nome do Cliente</th><th>Ações</th></tr>";

      while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['agendamento_procedimento'] . "</td>";
        echo "<td>" . $row['agendamento_data'] . "</td>";
        echo "<td>" . $row['animal_nome'] . "</td>";
        echo "<td>" . $row['cliente_nome'] . "</td>";
        echo "<td>";
        echo "<a href='edita_agenda.php?id=" . $row['agendamento_code'] . "'>Editar</a> | ";
        echo "<a href='exclui_agenda.php?id=" . $row['agendamento_code'] . "'>Apagar</a>";
        echo "</td>";
        echo "</tr>";
      }

      echo "</table>";
    } else {
      echo "Nenhum dado encontrado.";
    }
    ?>
    <button type="button" class="btn-volta"><a href="../index.php">Voltar</a></button>
  </div>
</body>

</html>