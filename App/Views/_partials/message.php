<div class="error-message">
    <?php if (isset($_SESSION['success_message'])) : ?>
        <div class="success-message">
            <?php echo $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?> <!-- Limpiar el mensaje después de mostrarlo -->
    <?php endif; ?>
</div>