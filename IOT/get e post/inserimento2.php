<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "utenti";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione == false) {
    die("errore di connessione: ") . $connessione->connect_error;
} 
echo "connessione avvenuta con successo: " . $connessione->host_info;

//INSERIMENTO DATI FORM
$nome = $connessione->real_escape_string($_REQUEST['nome']);
$cognome = $connessione->real_escape_string($_REQUEST['cognome']);
$numero = $connessione->real_escape_string($_REQUEST['telefono']);

$sql = "INSERT INTO utente(Nome, Cognome, Telefono) VALUES ('$nome', '$cognome', '$numero')";

if($connessione->query($sql) === true){
    $ultimo_elemento = $connessione->insert_id;
    echo "persona inserita con successo, il suo id e' " . $ultimo_elemento; 
} else {
    echo "errore: " . $connessione->error;
}

$connessione->close();
?>