<h2>Personas que quizás conozcas</h2>
<ul>
    <?php foreach ($availableUsers as $user) : ?>
        <?php if ($user['estado_amistad'] === 'disponible') : ?>
            <li>
                <div class="friend-pending">
                    <?= htmlspecialchars($user['username']) ?>
                </div>
                <div class="action-solicitud">
                    <a href="../Amigos/agregarAmigo?friend_id=<?= htmlspecialchars($user['id']) ?>">
                        <button>Enviar solicitud</button>
                    </a>
                </div>
            </li>
        <?php elseif ($user['estado_amistad'] === 'pendiente') : ?>
            <div class="friend-pending">
                <li><?= htmlspecialchars($user['username']) ?> - Pendiente</li>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<!-- <style>
    /* Estilos para la lista de usuarios */
    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        background-color: #f6f7f8;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Estilos para el botón de agregar */
    button {
        background-color: #1877f2;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #166fe5;
    }

    /* Estilos para el enlace */
    a {
        text-decoration: none;
        color: inherit;
    }
</style> -->