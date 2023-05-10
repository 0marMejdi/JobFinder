<?php
include_once "allFrags.php";
$jsonObj= json_encode(Sector::getSectors());

?>
<script>
    let obj = <?= $jsonObj ?>;
    console.log(obj);

</script>
