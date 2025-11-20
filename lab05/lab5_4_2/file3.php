<?
if(isset($_GET['ten']))
{
    echo 'Ten san pham vua nhap la:' .htmlspecialchars($_GET['ten']);
    echo '<br>';
}
if(isset($_GET['ct']))
{
    echo 'Cach tim la: ' .htmlspecialchars($_GET['ct']);
    echo '<br>';
}

if(isset($_GET['loai']))
{
    echo 'Loai san pham la:';
    if(is_array($_GET['loai']))
    {
        echo implode(",",$_GET['loai']);
    }
    else 
        echo 'chua chon loai';
}
echo '<hr>';
print_r($_GET);
?>
