<?php
if (!isset($_POST['nama'])) {
?>
    <form action="" method="post">
        <label for="nama">Nama Anda:</label>
        <input type="text" name="nama" id="nama" required>
        <button type="submit">Submit</button>
    </form>
<?php
} elseif (!isset($_POST['umur'])) {
?>
    <form action="" method="post">
        <input type="hidden" name="nama" value="<?php echo $_POST['nama']; ?>">
        <label for="umur">Umur Anda:</label>
        <input type="number" name="umur" id="umur" required>
        <button type="submit">Submit</button>
    </form>
<?php
} elseif (!isset($_POST['hobi'])) {
?>
    <form action="" method="post">
        <input type="hidden" name="nama" value="<?php echo $_POST['nama']; ?>">
        <input type="hidden" name="umur" value="<?php echo $_POST['umur']; ?>">
        <label for="hobi">Hobi Anda:</label>
        <input type="text" name="hobi" id="hobi" required>
        <button type="submit">Submit</button>
    </form>
<?php
} else {
?>
    <h2>Rangkuman</h2>
    <p>Nama: <?php echo htmlspecialchars($_POST['nama']); ?></p>
    <p>Umur: <?php echo htmlspecialchars($_POST['umur']); ?></p>
    <p>Hobi: <?php echo htmlspecialchars($_POST['hobi']); ?></p>
<?php
}
?>