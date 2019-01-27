<?php
$category_name = filter_input(INPUT_POST, 'name');

if ($category_name == null) {
    $error = "Invalid characters for field: 'Category Name', please check field and try again.";
    include 'error.php';
}
else {
    require_once 'database.php';

    $query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';

    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();



    include 'category_list.php';

}
?>