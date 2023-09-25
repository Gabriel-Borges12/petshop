<?php
include '../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM agendamentos WHERE agendamento_code = $id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: consulta_agenda.php");
    } else {
        echo "Erro ao excluir procedimento: " . $conn->connect_error;
    }
    $stmt->close();
}

?>