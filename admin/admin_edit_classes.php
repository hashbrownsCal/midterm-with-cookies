<?php include('view/header.php') ?>

<?php if ($classes) { ?>

    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>Vehicle Class List</h1>
        </header>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($classes as $class1) : ?>
                <tr>
                    <td class="list__item">
                        <p class="bold"><?= get_classname($class1['ID'])['Class'] ?></p>
                    </td>
                    <td>
                        <form action="./admin.php" method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id" value="<?= $class1['ID'] ?>">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php } else { ?>
    <p>No classes exist yet.</p>
<?php } ?>

<br>

<section>
    <h1>Add Vehicle Class</h1>
    <form class="mb-3" action="./admin.php" method="post">
        <input type="hidden" name="action" value="add_class">
        <label>Name:</label>
            <input type="text" name="classname" />
        <br>
        <label>&nbsp;</label>
            <input type="submit" value="Add Class" />
    </form>

    <br>
</section>

<section id="admin" class="admin">
    <a href="./admin.php">View All Vehicles</a>
    <br>
    <a href="?action=show_make_form">View/Edit Vehicle Makes</a>
    <br>
    <a href="?action=show_type_form">View/Edit Vehicle Types</a>
    <br>
    <a href="?action=show_add_form">Add a Vehicle</a>
    <br>
</section>

<?php include('view/footer.php') ?>