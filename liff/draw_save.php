<?php
$data = $_POST[data];
$data = file_get_contents($data);
touch('draw_system.json');
$output = file_get_contents('draw_system.json');
$output = (array)json_decode($output, true);
$output["num"]++;
$num = $output["num"];
$directory_path = "draw";
if (file_exists($directory_path)) {
} else {
    mkdir($directory_path, 0777);
}
file_put_contents('draw/draw'.$output["num"].'.png', $data, LOCK_EX);
$output = json_encode($output, (JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
$output = file_put_contents('draw_system.json', $output, LOCK_EX);
echo "https://"."domain"."/liff/draw/draw".$num.".png";
