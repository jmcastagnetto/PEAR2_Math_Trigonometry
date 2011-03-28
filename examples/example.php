<?php
require_once '../src/Math/Trigonometry.php';
use Math\Trigonometry; 

echo "Trigonometric functions\n";
echo "sin(PI/2) = ".Trigonometry::sin(M_PI_2)."\n";
echo "cos(PI/4) = ".Trigonometry::cos(M_PI_4)."\n";
echo "tan(PI) = ",Trigonometry::tan(M_PI)."\n";
echo "cot(PI/3) = ",Trigonometry::cot(M_PI/3)."\n";
echo "sec(2*PI/3) = ",Trigonometry::sec(2*M_PI/3)."\n";
echo "csc(2*PI/3) = ",Trigonometry::csc(2*M_PI/3)."\n";
echo "asin(1) = ".Trigonometry::asin(1)."\n";
echo "acos(0) = ".Trigonometry::acos(0)."\n";
echo Trigonometry::tan(M_PI_4)."\n";
echo Trigonometry::sinh(1.5)."\n";

?>
