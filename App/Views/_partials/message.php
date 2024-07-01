<div class="error-message">
    <?php if (isset($_SESSION['success_message'])) :?>
        <div class="success-message">
            <?php echo $_SESSION['success_message'];?>
        </div>
        <?php unset($_SESSION['success_message']);?> <!-- Limpiar el mensaje después de mostrarlo -->
    <?php endif;?>

    <?php if (isset($_SESSION['error_message'])) :?>
        <div class="error-message">
            <?php echo $_SESSION['error_message'];?>
        </div>
        <?php unset($_SESSION['error_message']);?> <!-- Limpiar el mensaje después de mostrarlo -->
    <?php endif;?>
</div>
