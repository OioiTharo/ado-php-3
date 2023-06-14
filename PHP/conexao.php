<?php
    function conectar() {
        try {
            $conn = "karaoke.bd";
            return new PDO("sqlite:$conn");
        } 
	    catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            throw $e;
        }
    }
?>