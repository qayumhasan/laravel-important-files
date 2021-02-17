## Start number with 01 - 10
``
$invID = 9;
echo $resturl =str_pad($invID, 2, '0', STR_PAD_LEFT)
``

## Get Previous 3 month in php
``
echo date('n', strtotime('0 month')).'<br>';
echo date('n', strtotime('-1 month')).'<br>';
echo date('n', strtotime('-2 month')).'<br>';
echo date('n', strtotime('-3 month')).'<br>';
``
