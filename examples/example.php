<?php
namespace PEAR2\Math {
use PEAR2\Math\Trigonometry; 

    echo "* Standard values:\n";
    echo "\tPI = ".strval(M_PI)."\n";
    echo "\tPI/4 = ".strval(M_PI_4)."\n";
    echo "\tPI/3 = ".strval(M_PI/3)."\n";
    echo "\tPI/2 = ".strval(M_PI_2)."\n";
    echo "\t2*PI/3 = ".strval(2*M_PI/3)."\n";

    echo "* Trigonometric functions\n";
    echo "\tsin(PI/2) = ".Trigonometry::sin(M_PI_2)."\n";
    echo "\tcos(PI/4) = ".Trigonometry::cos(M_PI_4)."\n";
    echo "\ttan(PI) = ",Trigonometry::tan(M_PI)."\n";
    echo "\tcot(PI/3) = ",Trigonometry::cot(M_PI/3)."\n";
    echo "\tsec(2*PI/3) = ",Trigonometry::sec(2*M_PI/3)."\n";
    echo "\tcsc(PI/3) = ",Trigonometry::csc(M_PI/3)."\n";
    echo "\tasin(1) = ".Trigonometry::asin(1)."\n";
    echo "\tacos(0) = ".Trigonometry::acos(0)."\n";
    echo "\tatan(0) = ".Trigonometry::atan(0)."\n";
    echo "\tatan2(1,0) = ".Trigonometry::atan2(1, 0)."\n";
    echo "\tatan2(sqrt(3),1) = ".Trigonometry::atan2(sqrt(3), 1)."\n";
    echo "\tasec(-2) = ".Trigonometry::asec(-2.0)."\n";
    echo "\tacsc(1.1547005383793) = ".Trigonometry::acsc(1.1547005383793)."\n";
    echo "\tacot(0.57735026918963) = ".Trigonometry::acot(0.57735026918963)."\n";

    echo "* Hyperbolic functions\n";
    echo "\tsinh(1.5) = ".Trigonometry::sinh(1.5)."\n";
    echo "\tcosh(1.5) = ".Trigonometry::cosh(1.5)."\n";
    echo "\tsech(1.5) = ".Trigonometry::sech(1.5)."\n";
    echo "\tcsch(1.5) = ".Trigonometry::csch(1.5)."\n";
    echo "\ttanh(1.5) = ".Trigonometry::tanh(1.5)."\n";
    echo "\tcoth(1.5) = ".Trigonometry::coth(1.5)."\n";
    echo "\tasinh(1.2) = ".Trigonometry::asinh(1.2)."\n";
    echo "\tacosh(1.2) = ".Trigonometry::acosh(1.2)."\n";
    echo "\tasech(0.2) = ".Trigonometry::asech(0.2)."\n";
    echo "\tacsch(1.2) = ".Trigonometry::acsch(1.2)."\n";
    echo "\tatanh(0.2) = ".Trigonometry::atanh(0.2)."\n";
    echo "\tacoth(1.2) = ".Trigonometry::acoth(1.2)."\n";
}

?>
