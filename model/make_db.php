<?php

function get_make($make_id) {
    global $db;
    $query = 'SELECT Make FROM makes
        WHERE ID = :make_id';
    $statement = $db->prepare($query);
    $statement -> bindValue(':make_id', $make_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}

function get_makesAll()
{
    global $db;
    $query = 'SELECT * FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM makes
                WHERE (ID = :make_id)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($makename)
{
    global $db;
    $query = 'INSERT INTO makes(Make)
                VALUES (:makename)';
    $statement = $db->prepare($query);
    $statement -> bindValue(':makename', $makename);
    $statement->execute();
    $statement->closeCursor();
}
?>