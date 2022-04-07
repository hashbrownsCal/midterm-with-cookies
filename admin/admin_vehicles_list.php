<?php include('view/header.php') ?>

<form class="mb-3" action="./admin.php?sort_by=<?php echo $sort_by;?>" method="post">
    <select name="make_id" id="make_id" onChange="submit();">
        <option>Makes</option>      
        <option value="0">View All Makes</option>
        <?php foreach ($makes as $make) : ?>
            <option value="<?php echo $make['ID'];?>">
                <?php echo $make['Make']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<form class="mb-3" action="./admin.php?sort_by=<?php echo $sort_by;?>" method="post">
    <select name="type_id" id="type_id" onChange="submit();">
        <option>Types</option>
        <option value="0">View All Types</option>
        <?php foreach ($types as $type) : ?>
            <option value="<?php echo $type['ID']; ?>">
                <?php echo $type['Type']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<form class="mb-3" action="./admin.php?sort_by=<?php echo $sort_by;?>" method="post">
    <select name="class_id" id="class_id" onChange="submit();">
        <option>Classes</option> 
        <option value="0">View All Classes</option>
        <?php foreach ($classes as $class) : ?>
            <option value="<?php echo $class['ID']; ?>">
                <?php echo $class['Class']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<form class="mb-3" action="./admin.php?make_id=<?php echo $make_id;?>&type_id=<?php echo $type_id;?>&class_id=<?php echo $class_id;?>" method="post">
    <select name="sort_by" id="sort_by" onChange="submit();">
        <option>Sort By</option> 
        <option value="sort_by_price">Price</option>
        <option value="sort_by_year">Year</option>
    </select>
</form>
<br>

<?php
if ($sort_by == "sort_by_price") {
    if ($make_id != 0 || $class_id != 0 || $type_id != 0) {
                if ($make_id == 0 && $class_id == 0) $vehicles = get_vehicles_bytype_price($type_id);
                if ($make_id == 0 && $type_id == 0) $vehicles = get_vehicles_byclass_price($class_id);
                if ($type_id == 0 && $class_id == 0) $vehicles = get_vehicles_bymake_price($make_id);
            }
    else $vehicles = get_vehicles_price();
}

else if ($sort_by == "sort_by_year") {
    if ($make_id != 0 || $class_id != 0 || $type_id != 0) {
        if ($make_id == 0 && $class_id == 0) $vehicles = get_vehicles_bytype_year($type_id);
        if ($make_id == 0 && $type_id == 0) $vehicles = get_vehicles_byclass_year($class_id);
        if ($type_id == 0 && $class_id == 0) $vehicles = get_vehicles_bymake_year($make_id);
    }
    else $vehicles = get_vehicles_year();
}
?>

<?php if ($vehicles) { ?>

    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>
                <?php if ($make_id != 0 || $class_id != 0 || $type_id != 0) {
                    if ($make_id == 0 && $class_id == 0) echo get_type($type_id)["Type"];
                    if ($make_id == 0 && $type_id == 0) echo get_classname($class_id)["Class"];
                    if ($type_id == 0 && $class_id == 0) echo get_make($make_id)["Make"];
                    } else echo "All";
                    ?>
                 vehicles list, sorted by <?php if ($sort_by == "sort_by_year") echo "year";
                                else echo "price"; ?>
            </h1>
        </header>

        <table class="table">
            <tr>
                <th scope="col">Year</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Type</th>
                <th scope="col">Class</th>
                <th scope="col">Price</th>
                <th scope="col">&nbsp;</th>
            </tr>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td class="list__item">
                        <p class="bold"><?= $vehicle['year'] ?></p>
                    </td>
                    <td class="list__item">
                        <p class="bold"><?= get_make($vehicle['make_id'])['Make'] ?></p>
                    </td>
                    <td class="list__item">
                        <p class="bold"><?= $vehicle['model'] ?></p>
                    </td>
                    <td class="list__item">
                        <p class="bold"><?= get_type($vehicle['type_id'])['Type'] ?></p>
                    </td>
                    <td class="list__item">
                        <p class="bold"><?= get_classname($vehicle['class_id'])['Class'] ?></p>
                    </td>
                    <td class="list__item">
                        <p class="bold"><?= $vehicle['price'] ?></p>
                    <td>
                        <form action="./admin.php" method="post">
                            <input type="hidden" name="action" value="delete_vehicle">
                            <input type="hidden" name="year" value="<?= $vehicle['year'] ?>">
                            <input type="hidden" name="make_id" value="<?= $vehicle['make_id']; ?>">
                            <input type="hidden" name="model" value="<?= $vehicle['model'] ?>">
                            <input type="hidden" name="type_id" value="<?= $vehicle['type_id'] ?>">
                            <input type="hidden" name="class_id" value="<?= $vehicle['class_id'] ?>">
                            <input type="hidden" name="price" value="<?= $vehicle['price'] ?>">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php } else { ?>
    <p>No vehicles exist yet.</p>
<?php } ?>

<br>

<section id="admin" class="admin">
    <a href="?action=show_add_form">Add a Vehicle</a>
    <br>
    <a href="?action=show_make_form">View/Edit Vehicle Makes</a>
    <br>
    <a href="?action=show_type_form">View/Edit Vehicle Types</a>
    <br>
    <a href="?action=show_class_form">View/Edit Vehicle Classes</a>
    <br>
</section>

<?php include('view/footer.php') ?>