<?php include('view/header.php') ?>

<?php if ($types) { ?>

    <section id="list" type="list">
        <header type="list__row list__header">
            <h1>Vehicle Type List</h1>
        </header>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($types as $type) : ?>
                <tr>
                    <td type="list__item">
                        <p type="bold"><?= get_type($type['ID'])['Type'] ?></p>
                    </td>
                    <td>
                        <form action="./admin.php" method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_id" value="<?= $type['ID'] ?>">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php } else { ?>
    <p>No types exist yet.</p>
<?php } ?>

<br>

<section>
    <h1>Add Vehicle Type</h1>
    <form class="mb-3" action="./admin.php" method="post">
        <input type="hidden" name="action" value="add_type">
        <label>Name:</label>
            <input type="text" name="typename" />
        <br>
        <label>&nbsp;</label>
            <input type="submit" value="Add Type" />
    </form>

    <br>
</section>

<section id="admin" type="admin">
    <a href="./admin.php">View All Vehicles</a> 
    <br>
    <a href="?action=show_make_form">View/Edit Vehicle Makes</a>
    <br>
    <a href="?action=show_add_form">Add a Vehicle</a>
    <br>
    <a href="?action=show_class_form">View/Edit Vehicle Classes</a>
    <br>
</section>

<?php include('view/footer.php') ?>