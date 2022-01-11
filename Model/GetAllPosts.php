<?php
include "db/dbconnect.php";

class GetAllPost
{

    function getAllPost()
    {
        $con = new connect();

        $sql = "SELECT * FROM article ORDER BY created DESC";

        $items = $con->NonePramSQL($sql);

        return $items;
    }
}
?>

<?php
$obj = new GetAllPost();
$items = $obj->getAllPost();
foreach ($items as $item) : ?>
    <p><?php echo $item['id']; ?></p>
    <p><?php echo $item['title']; ?></p>
<?php endforeach; ?>