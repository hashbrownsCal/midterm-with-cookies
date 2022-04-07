<?php include('view/header.php') ?>

<form class="mb-3" action="./admin.php?action=add_vehicle" method="post">
    <h1>Add Vehicle</h1>

    <label>Make:</label>
        <select name="make_id" id="make_id">
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['ID'];?>">
                    <?php echo $make['Make']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    <br>
    <label>Type:</label>
        <select name="type_id" id="type_id">
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['ID']; ?>">
                    <?php echo $type['Type']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    <br>
    <label>Class:</label>
        <select name="class_id" id="class_id" >
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['ID']; ?>">
                    <?php echo $class['Class']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    <br>
    <label>Year:</label>
        <input type="text" name="year" />
    <br>
    <label>Model:</label>
        <input type="text" name="model" />
    <br>
    <label>Price:</label>
        <input type="text" name="price" />
    <br>
    <label>&nbsp;</label>
        <input type="submit" value="Add Vehicle" />
    <br>
</form>

<br>

<section id="admin" class="admin">
    <a href="./admin.php">View All Vehicles</a>
    <br>
    <a href="?action=show_make_form">View/Edit Vehicle Makes</a>
    <br>
    <a href="?action=show_type_form">View/Edit Vehicle Types</a>
    <br>
    <a href="?action=show_class_form">View/Edit Vehicle Classes</a>
    <br>
</section>

<?php include('view/footer.php') ?>