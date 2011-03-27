<?php
require_once '../src/Math/Trigonometry.php';
use Math\Trigonometry; 

echo Trigonometry::sin(M_PI_2)."\n";
echo Trigonometry::sin(M_PI_4)."\n";
echo Trigonometry::sin(1E-15)."\n";

echo Trigonometry::cos(M_PI_2)."\n";
echo Trigonometry::cos(M_PI_4)."\n";
echo Trigonometry::cos(1E-15)."\n";
echo "tan\n";
echo Trigonometry::tan(M_PI)."\n";
echo Trigonometry::tan(M_PI_4)."\n";
echo Trigonometry::tan(1E-15)."\n";

echo Trigonometry::sinh(1.5)."\n";

?>
