<?php
include '../includes/conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cliente WHERE cliente_cpf = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $cliente = $resultado->fetch_assoc();
    } else {
        die("Cliente não encontrado.");
    }
} else {
    die("ID do cliente não especificado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $sql = "UPDATE cliente SET cliente_nome = ? WHERE cliente_nome = cliente_cpf";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);

    if ($stmt->execute()) {
        header("Location: consulta_cliente.php");
    } else {
        echo "Erro ao atualizar cliente: " . $conn->connect_error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar</title>
</head>

<body>
    <h1>Editar Clientes</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $cliente['cliente_nome']; ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</body>

</html>