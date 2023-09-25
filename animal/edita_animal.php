<?php
include '../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM animal WHERE animal_code = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $cliente = $resultado->fetch_assoc();
    } else {
        die("Animal não encontrado.");
    }
} else {
    die("ID do animal não especificado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $sql = "UPDATE animal SET animal_nome = ? WHERE animal_nome = animal_code";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);

    if ($stmt->execute()) {
        header("Location: consulta_animal.php");
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
    <title>Documento</title>
</head>
<body>
    <h1>Editar Animais</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $animal['animal_code']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $animal['animal_nome']; ?>" required>
        <label for="cpf">Raça:</label>
        <input type="text" name="raca" id="raca" value="<?php echo $animal['animal_raca']; ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>