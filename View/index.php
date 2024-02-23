
<?php

include base_path('/View/Frontend/procted/Heads.php');

?>
<!-- ##### Header Area Start ##### -->
<?php
$carts = (new \Http\Controller\CartController())->index();
$total = 0;
$total_quantity = array_sum(array_column($carts, "quantity"));
include base_path('/View/Frontend/procted/header.php');


?>

{{__contain}}

<?php
include base_path('/View/Frontend/procted/footer.php');
?>
