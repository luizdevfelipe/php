<?php 
    require_once 'app/Toaster.php';
    require_once 'app/ToasterPro.php';
    use app\Toaster;
    use app\ToasterPro;

    $toaster = new ToasterPro();
    $toaster->addSlice('bread');
    $toaster->addSlice('bread');
    $toaster->addSlice('bread');
    $toaster->toastBagel();

?>