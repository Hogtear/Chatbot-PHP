<?php
// Conectando ao Banco de dados
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// Recebendo a resposta do usuário com AJAX
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checando o query do usuário com o banco de dados
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// se a consulta do usuário correspondeu à consulta do banco de dados, mostraremos a resposta caso contrário, ela irá para outra declaração
if(mysqli_num_rows($run_query) > 0){
    //buscar o replay do banco de dados de acordo com a consulta do usuário
    $fetch_data = mysqli_fetch_assoc($run_query);
    //armazenamento replay para uma variável que vai ser enviada para o ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Desculpe, mas nós não entendemos.";
}

?>