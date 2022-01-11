<?php
include "db/dbconnect.php";

class GetPostById
{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    function getPostById()
    {
        $con = new connect();
        $id = $this->id;
        $sql = "SELECT * FROM article WHERE id=:id";

        $items = $con->PramSQL($sql, $id);

        return $items;
    }
}
?>

<?php
$obj = new GetPostById(11);
$items = $obj->getPostById();
foreach ($items as $item) : ?>
    <p><?php echo $item['id']; ?></p>
    <p><?php echo $item['title']; ?></p>
<?php endforeach; ?>