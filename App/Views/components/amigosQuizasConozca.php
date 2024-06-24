<h2>Personas que quizás conozcas</h2>
<ul>
    <?php foreach ($availableUsers as $user): ?>
        <?php if ($user['estado_amistad'] === 'disponible'): ?>
            <li>
                <?= htmlspecialchars($user['username']) ?>
                <a href="../Amigos/agregarAmigo?friend_id=<?= htmlspecialchars($user['id']) ?>">
                    <button>Enviar solicitud de amistad</button>
                </a>
            </li>
        <?php elseif ($user['estado_amistad'] === 'pendiente'): ?>
            <li><?= htmlspecialchars($user['username']) ?> - Solicitud: Pendiente</li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<style>
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
</style>