<?php
include '../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM animal WHERE animal_code = $id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: consulta_animal.php");
    } else {
        echo "Erro ao excluir dados do animal: " . $conn->connect_error;
    }
    $stmt->close();
}

?>