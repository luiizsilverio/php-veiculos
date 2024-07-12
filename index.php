<?php include 'conexao.php'; 

  if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
    $pesquisa = $mysql->escape_string($busca);
  
    $sql = "SELECT * FROM veiculos WHERE fabricante LIKE '%$pesquisa%' 
            OR veiculo LIKE '%$pesquisa%' OR veiculo LIKE '%pesquisa%'";
  
    $result = $mysql->query($sql) or die("Erro ao consultar! " . $mysql->error);
  }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Veículos</title>
</head>
<body>

  <h1>Lista de Veículos</h1>

  <form action="">
    <input type="text" name="busca" value="<?php echo $busca; ?>" placeholder="Digite algo para pesquisar...">
    <button type="submit">Pesquisar</button>
  </form>
  <br>

  <table border="1" width="600px">
    <thead>
      <th>Marca</th>
      <th>Veículo</th>
      <th>Modelo</th>
    </thead>
    <tbody>      
      <?php if (!isset($_GET['busca'])) { ?>
        <tr>
          <td colspan="3"><br></td>
        </tr>
      <?php } elseif ($result->num_rows == 0) {
          echo '<td colspan="3">Veículo não encontrado!</td>';
        } else {
        while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['fabricante']; ?></td>
            <td><?php echo $row['veiculo']; ?></td>
            <td><?php echo $row['modelo']; ?></td>
          </tr>
      <?php }} ?>
    </tbody>
  </table>
</body>
</html>
