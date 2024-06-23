<h2>Personas que quizás conozcas</h2>

<?php foreach ($users as $user): ?>
    <div class="amigo">
        <span><?= htmlspecialchars($user['username']) ?></span>
        <span>ID: <?= htmlspecialchars($user['id']) ?></span>
        <a href="../Amigos/agregarAmigo?friend_id=<?= htmlspecialchars($user['id']) ?>">
            <button>Agregar</button>
        </a>
    </div>
<?php endforeach; ?>
