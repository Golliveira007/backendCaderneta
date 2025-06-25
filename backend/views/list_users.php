<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header('Location: login.html');
    exit;
}
require 'functions-db.php'; // suas funções de CRUD no banco

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'save') {
    saveUser($_POST);
    header("Location: index.php");
    exit;
}
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    deleteUser(intval($_GET['id']));
    header("Location: index.php");
    exit;
}
$users = listUsers();
$editUser = null;
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $editUser = getUserById(intval($_GET['id']));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head> ... </head>
<body>
  <button id="add-user-btn">Novo Usuário</button>
  
  
  <?php if ($editUser !== null): ?>
    <div id="user-form-modal" class="modal">
      <h2><?= $editUser['id'] ? 'Editar' : 'Criar' ?> Usuário</h2>
      <form id="user-form" method="post" action="index.php?action=save">
        <input type="hidden" name="id" value="<?= $editUser['id'] ?>">
        <!-- campos nome, email, senha, tipo -->
        <button type="submit">Salvar</button>
        <button id="cancel-form">Cancelar</button>
      </form>
    </div>
  <?php endif; ?>

  <table>
    <!-- loop de listagem -->
  </table>

  <script src="app.js"></script>
</body>
</html>
