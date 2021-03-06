<?php
/**
 * PEAR2\Math\Trigonometry
 *
 * PHP Version 5
 *
 * @category  Math
 * @package   PEAR2\Math\Trigonometry
 * @author    Jesus M. Castagnetto <jesus@castagnetto.com>
 * @copyright 2011 Jesus M. Castagnetto
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version   0.1.0
 * @link      https://github.com/jmcastagnetto/Math_Trigonometry
 */
namespace PEAR2\Math { /*{{{*/

/**
 * Class implementing static circular and hyperbolic trigonometric functions, and their inverses
 *
 * Example of use:
 *
 * require_once 'Math/Trigonometry.php';
 * $cot = PEAR2\Math\Trigonometry::cot(0.3445);
 * $x = PEAR2\Math\Trigonometry::acsch(-0.231);
 * 
 * Originally this class was part of NumPHP (Numeric PHP package)
 *
 * @category  Math
 * @package   PEAR2\Math\Trigonometry
 * @author    Jesus M. Castagnetto <jesus@castagnetto.com>
 * @copyright 2011 Jesus M. Castagnetto
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      https://github.com/jmcastagnetto/Math_Trigonometry
 * @access    public
 */
class Trigonometry /*{{{*/
{

    /**
     * PEAR2\Math\Trigonometry::EPSILON
     *
     * Cutoff value to decide if a result is too close to zero
     */
    const EPSILON = 1E-15;

    // Trigonometric functions

    /**
     * Calculates the sine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function sin($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(sin(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the cosine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function cos($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(cos(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the tangent of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function tan($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $c = cos(floatval($x));
        if (Trigonometry::_isCloseToZero($c)) {
            throw new \UnexpectedValueException('Tangent undefined for '.$x.', cosine is zero too close to zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(tan(floatval($x)));
        }
    } /*}}}*/
    
    /**
     * Calculates the secant of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function sec($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $x = floatval($x);
        $c = cos($x);
        if (Trigonometry::_isCloseToZero($c)) {
            throw new \UnexpectedValueException('Secant undefined for '.$x.', cosine is zero or too close to zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(1/$c);
        }
    }/*}}}*/

    /**
     * Calculates the cosecant of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function csc($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $x = floatval($x);
        $s = sin($x);
        if (Trigonometry::_isCloseToZero($s)) {
            throw new \UnexpectedValueException('Cosecant undefined for '.$x.', sine is zero or too close to zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(1/$s);
        }
    }/*}}}*/

    /**
     * Calculates the cotangent of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function cot($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $x = floatval($x);
        $t = tan($x);
        if (Trigonometry::_isCloseToZero($t)) {
            throw new \UnexpectedValueException('Cosecant undefined for '.$x.', tangent is zero or too close to zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(1/$t);
        }
    }/*}}}*/

    // inverse trigonometric functions

    /**
     * Calculates the inverse sine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function asin($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(asin(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the inverse cosine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function acos($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(acos(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the inverse tangent of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function atan($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(atan(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the inverse tangent of the parameter
     *
     * @param float $x numeric value
     * @param float $y numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if both parameters are not numeric
     * @static
     * @access public
     */
    public static function atan2($x, $y) /*{{{*/
    {
        if (!is_numeric($x) || !is_numeric($y)) {
            throw new \InvalidArgumentException('Expecting numeric parameters');
        }
        return Trigonometry::_zeroIfVerySmall(atan2(floatval($x), floatval($y)));
    } /*}}}*/

    /**
     * Calculates the inverse secant of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function asec($x)/*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        if (Trigonometry::_isCloseToZero($x)) {
            throw new \UnexpectedValueException('Value too close to zero: '.$x);
        }
        $cos = 1/$x;
        return Trigonometry::_zeroIfVerySmall(acos($cos));
    }/*}}}*/
    
    /**
     * Calculates the inverse cosecant of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function acsc($x)/*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        if (Trigonometry::_isCloseToZero($x)) {
            throw new \UnexpectedValueException('Value too close to zero: '.$x);
        }
        $sin = 1/$x;
        return Trigonometry::_zeroIfVerySmall(asin($sin));
    }/*}}}*/
    
    /**
     * Calculates the inverse cotangent of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function acot($x)/*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        if (Trigonometry::_isCloseToZero($x)) {
            throw new \UnexpectedValueException('Value too close to zero: '.$x);
        }
        $tan = 1/$x;
        return Trigonometry::_zeroIfVerySmall(atan($tan));
    }/*}}}*/
    
    // Hyperbolic functions

    /**
     * Calculates the hyperbolic sine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function sinh($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(sinh(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the hyperbolic cosine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function cosh($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(cosh(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the hyperbolic tangent of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function tanh($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(tanh(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the hyperbolic secant of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function sech ($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $c = cosh(floatval($x));
        if (Trigonometry::_isCloseToZero($c)) {
            throw new \UnexpectedValueException('Undefined operation, hyperbolic cosine of parameter is zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(1/$c);
        }
    }/*}}}*/

    /**
     * Calculates the hyperbolic cosecant of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function csch ($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $s = sinh(floatval($x));
        if (Trigonometry::_isCloseToZero($s)) {
            throw new \UnexpectedValueException('Undefined operation, hyperbolic sine of parameter is zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(1/$s);
        }
    }/*}}}*/

    /**
     * Calculates the hyperbolic cotangent of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function coth ($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $t = tanh(floatval($x));
        if (Trigonometry::_isCloseToZero($t)) {
            throw new \UnexpectedValueException('Undefined operation, hyperbolic tangent of parameter is zero');
        } else {
            return Trigonometry::_zeroIfVerySmall(1/$t);
        }
    }/*}}}*/

    // Inverse hyperbolic functions

    /**
     * Calculates the inverse hyperbolic sine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function asinh($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(asinh(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the inverse hyperbolic cosine of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function acosh($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(acosh(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the inverse hyperbolic tangent of the parameter
     *
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @static
     * @access public
     */
    public static function atanh($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        return Trigonometry::_zeroIfVerySmall(atanh(floatval($x)));
    } /*}}}*/

    /**
     * Calculates the inverse hyperbolic secant of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function asech ($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $x = floatval($x);
        if (Trigonometry::_isCloseToZero($x)) {
            throw new \UnexpectedValueException('Undefined operation, parameter is too close zero or zero');
        } else {
            $r = log((1 + sqrt(1 - $x*$x)) / $x);
            return Trigonometry::_zeroIfVerySmall($r);
        }
    }/*}}}*/

    /**
     * Calculates the inverse hyperbolic cosecant of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function acsch ($x) /*{{{*/
    {
        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $x = floatval($x);
        if (Trigonometry::_isCloseToZero($x)) {
            throw new \UnexpectedValueException('Undefined operation, parameter is too close zero or zero');
        } elseif ($x < 0) {
            throw new \UnexpectedValueException('Undefined operation, parameter is negative');
        } else {
            $r = log((1 + sqrt(1 + $x*$x)) / $x);
            return Trigonometry::_zeroIfVerySmall($r);
        }
    }/*}}}*/

    /**
     * Calculates the inverse hyperbolic cotangent of the parameter
     * 
     * @param float $x numeric value
     *
     * @return float A floating point on success
     * @throws \InvalidArgumentException if parameter is not numeric
     * @throws \UnexpectedValueException if the calculation will be undefined or ill-defined
     * @static
     * @access public
     */
    public static function acoth ($x) /*{{{*/
    {

        if (!is_numeric($x)) {
            throw new \InvalidArgumentException('Expecting a numeric parameter');
        }
        $x = floatval($x);
        if ($x == 1.0) {
            throw new \UnexpectedValueException('Undefined operation, parameter cannot be 1.0');
        } else {
            $rat = ($x + 1)/($x - 1);
            if ($rat < 0) {
                throw new \UnexpectedValueException('Undefined operation, (x+1)/(x-1) is negative');
            } else {
                return Trigonometry::_zeroIfVerySmall(0.5*log($rat));
            }
        }
    }/*}}}*/

    /**
     * Figures out if (value) is in [-epsilon, epsilon]
     * 
     * @param numeric $value The number to be analyzed
     *
     * @return boolean whether the value is close to epsilon or not
     * @access private
     */
    private static function _isCloseToZero($value) /*{{{*/
    {
        return (($value <= Trigonometry::EPSILON) && ($value >= -1*Trigonometry::EPSILON));
    }/*}}}*/

    /**
     * If (value) is in [-epsilon, epsilon], then return 0 (zero), otherwise return the value unchanged
     *
     * @param numeric $value The number to be analyzed
     *
     * @return zero (0.0) if value is close to zero, the value otherwise
     * @access private
     */
    private static function _zeroIfVerySmall($value) /*{{{*/
    {
        if (Trigonometry::_isCloseToZero($value)) {
            return 0.0;
        } else {
            return $value;
        }
    }/*}}}*/

}/*}}} class Trigonometry */

} /*}}} namespace PEAR2\Math\Trigonometry */
?>
