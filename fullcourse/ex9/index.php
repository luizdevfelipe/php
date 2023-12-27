<?php
//Control Structures (if / else / elseif / else if)
/*
$score = 37;
if ($score >= 80) {
    echo 'A';
    if ($score >= 90){
        echo '+';
    }
} elseif ($score >= 70) {
    echo 'B';
    if ($score >= 75){
        echo '+';
    }
} elseif ($score >= 60) {
    echo 'C';
    if ($score >= 65){
        echo '+';
    }
} elseif ($score >= 40) {
    echo 'D';
    if ($score >= 45){
        echo '+';
    }
} elseif ($score >= 30) {
    echo 'E';
    if ($score >= 35){
        echo '+';
    }
} else {
    echo 'F';
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $score = 87;?>
    <?php if ($score >= 80) :?> 
        <strong>A</strong>
    <?php elseif ($score >= 70) :?>
        <strong>B</strong>
    <?php else: ?>
        <strong>F</strong>
    <?php endif ?>

    <?php $i = 0?>
    <?php while ($i <= 15): ?>
        <?php if ($i % 2 == 0): ?>
            <?php echo $i?>
        <?php endif ?>
        <?php $i++?>
    <?php endwhile; ?>




</body>
</html>