<?php include('view/header.php') ?>

<?php if ($makes) { ?>

    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>Vehicle Make List</h1>
        </header>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($makes as $make) : ?>
                <tr>
                    <td class="list__item">
                        <p class="bold"><?= get_make($make['ID'])['Make'] ?></p>
                    </td>
                    <td>
                        <form action="./admin.php" method="post">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="make_id" value="<?= $make['ID'] ?>">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php } else { ?>
    <p>No makes exist yet.</p>
<?php } ?>

<br>

<section>
    <h1>Add Vehicle Make</h1>
    <form class="mb-3" action="./admin.php" method="post">
        <input type="hidden" name="action" value="add_make">
        <label>Name:</label>
            <input type="text" name="makename" />
        <br>
        <label>&nbsp;</label>
            <input type="submit" value="Add Make" />
    </form>

    <br>
</section>

<section id="admin" class="admin">
    <a href="./admin.php">View All Vehicles</a>
    <br>
    <a href="?action=show_add_form">Add a Vehicle</a>
    <br>
    <a href="?action=show_type_form">View/Edit Vehicle Types</a>
    <br>
    <a href="?action=show_class_form">View/Edit Vehicle Classes</a>
    <br>
</section>

<?php include('view/footer.php') ?>