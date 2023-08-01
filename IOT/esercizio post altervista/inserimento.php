<?php

$dbname = "my_angelodalo";
$connessione = new mysqli($servername, $username, $password, $dbname);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 
echo "connessione avvenuta con successo: " . $connessione->host_info;

//INSERIMENTO DATI FORM
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO Utenti(Nome, Cognome, Telefono) VALUES ('$nome', '$cognome', '$telefono')";

if($connessione->query($sql) === true){
    $ultimo_elemento = $connessione->insert_id;
    echo "persona inserita con successo, il suo id e' " . $ultimo_elemento; 
} else {
    echo "errore: " . $connessione->error;
}

$connessione->close();
?>
