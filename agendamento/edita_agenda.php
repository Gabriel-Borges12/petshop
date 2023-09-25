<?php
include '../includes/conexao.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM agendamentos WHERE agendamento_code = $id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $agendamento = $resultado->fetch_assoc();
        }else{
            die("Paciente não encontrado.");
        }
    }else{
        die("ID do paciente não especificado.");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $agendamento_procedimento = $_POST['agendamento_procedimento'];

        $sql = "UPDATE agendamento SET agendamento_procedimento = ? WHERE agendamento_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $nome, $id);

        if ($stmt->execute()) {
            header("Location: consulta_agenda.php");
        }else{
            echo "Erro ao atualizar paciente: ".$conn->connect_error;
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
    <h1>Editar Procedimento</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $agendamento['id_paciente']; ?>">

        <label for="nome">Procedimento:</label>
        <input type="text" name="agendamento_procedimento" id="agendamento_procedimento" value="<?php echo $agendamento['agendamento_procedimento']; ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>