<?php
include '../includes/conexao.php';

$sql = "SELECT * FROM agendamentos
JOIN animal
  ON agendamentos.animal_code = animal.id
JOIN cliente
  ON agendamentos.cliente_cpf = cliente.id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='2'>";
    echo "<tr><th>Procedimento</th><th>Data</th><th>Nome do Animal</th><th>Nome do Cliente</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['agendamento_procedimento'] . "</td>";
        echo "<td>" . $row['agendamento_data'] . "</td>";
        echo "<td>" . $row['animal_nome'] . "</td>";
        echo "<td>" . $row['cliente_nome'] . "</td>";
        echo "<td>";
        echo "<a href='editar.php?id=" . $row['agendamento_code'] . "'>Editar</a> | ";
        echo "<a href='excluir.php?id=" . $row['agendamento_code'] . "'>Apagar</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum dado encontrado.";
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
<button type="button" class="btn-volta"><a href="index.php">Voltar</a></button>
</body>
</html>





