<?php
include '../includes/conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM cliente WHERE cliente_nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: consulta_cliente.php");
    } else {
        echo "Erro ao excluir dados de clientes: " . $conn->connect_error;
    }
    $stmt->close();
}

?>