<?php include('./view/header.php') ?>

<form class="mb-3" action=".?sort_by=<?php echo $sort_by;?>" method="post">
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

<form class="mb-3" action=".?sort_by=<?php echo $sort_by;?>" method="post">
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

<form class="mb-3" action=".?sort_by=<?php echo $sort_by;?>" method="post">
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

<form class="mb-3" action=".?make_id=<?php echo $make_id;?>&type_id=<?php echo $type_id;?>&class_id=<?php echo $class_id;?>" method="post">
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
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php } else { ?>
    <p>No vehicles exist yet.</p>
<?php } ?>

<br>

<?php include('./view/footer.php') ?>