<?php
namespace PEAR2\Math {
use PEAR2\Math\Trigonometry;

    /**
     * Test class for PEAR2\Math\Trigonometry.
     */
    class TrigonometryTest extends \PHPUnit_Framework_TestCase
    {

        /**
         * Sets up the fixture
         * This method is called before a test is executed.
         */
        protected function setUp()
        {
        }

        /**
         * Tears down the fixture
         * This method is called after a test is executed.
         */
        protected function tearDown()
        {
        }

        /**
         * Tests of sine
         */
        public function testSin()
        {
            $sin1 = Trigonometry::sin(M_PI_4);
            $sin2 = Trigonometry::sin(1E-15);
            $this->assertEquals(0.70710678118655, $sin1, '', 1E-8);
            $this->assertEquals(0.0, $sin2, '', 1E-8);
        }

        /**
         * Test of cosine
         */
        public function testCos()
        {
            $cos1 = Trigonometry::cos(M_PI_4);
            $cos2 = Trigonometry::cos(1E-15);
            $this->assertEquals(0.70710678118655, $cos1, '', 1E-8);
            $this->assertEquals(1.0, $cos2, '', 1E-8);
        }

        /**
         * Test of tangent
         */
        public function testTan()
        {
            $tan1 = Trigonometry::tan(M_PI_4);
            $tan2 = Trigonometry::tan(1E-15);
            $this->assertEquals(1.0, $tan1, '', 1E-8);
            $this->assertEquals(0.0, $tan2, '', 1E-8);
        }

        /**
         * Test of secant
         */
        public function testSec()
        {
            $sec = Trigonometry::sec(2*M_PI/3);
            $this->assertEquals(-2.0, $sec, '', 1E-8);
        }

        /**
         * Test of cosecant
         */
        public function testCsc()
        {
            $csc = Trigonometry::csc(M_PI/3);
            $this->assertEquals(1.1547005383793, $csc, '', 1E-8);
        }

        /**
         * Test of cotangent
         */
        public function testCot()
        {

            $cot = Trigonometry::cot(M_PI/3);
            $this->assertEquals(0.57735026918963, $cot, '', 1E-8);
        }

        /**
         * Test of arcsine
         */
        public function testAsin()
        {
            $asin = Trigonometry::asin(1.0);
            $this->assertEquals(M_PI_2, $asin, '', 1E-8);
        }

        /**
         * Test of arccosine
         */
        public function testAcos()
        {
            $acos = Trigonometry::acos(0.0);
            $this->assertEquals(M_PI_2, $acos, '', 1E-8);
        }

        /**
         * Test of arctangent
         */
        public function testAtan()
        {
            $atan = Trigonometry::atan(1.0);
            $this->assertEquals(M_PI_4, $atan, '', 1E-8);
        }

        /**
         * Test of arctangent with two parameters (atan2)
         */
        public function testAtan2()
        {
            $atan2_1 = Trigonometry::atan2(1, 0);
            $atan2_2 = Trigonometry::atan2(sqrt(3), 1);
            $this->assertEquals(M_PI_2, $atan2_1, '', 1E-8);
            $this->assertEquals(M_PI / 3, $atan2_2, '', 1E-8);
        }

        /**
         * Test of arcsecant
         */
        public function testAsec()
        {
            $asec = Trigonometry::asec(-2.0);
            $this->assertEquals(2*M_PI/3, $asec, '', 1E-8);
        }

        /**
         * Test of arccosecant
         */
        public function testAcsc()
        {
            $acsc = Trigonometry::acsc(1.1547005383793);
            $this->assertEquals(M_PI/3, $acsc, '', 1E-8);
        }

        /**
         * Test of arccotangent
         */
        public function testAcot()
        {
            $acot = Trigonometry::acot(0.57735026918963);
            $this->assertEquals(M_PI/3, $acot, '', 1E-8);
        }

        /**
         * Test of hyperbolic sine
         */
        public function testSinh()
        {
            $sinh = Trigonometry::sinh(1.5);
            $this->assertEquals(2.1292794550948, $sinh, '', 1E-8);
        }

        /**
         * Test of hyperbolic cosine
         */
        public function testCosh()
        {
            $cosh = Trigonometry::cosh(1.5);
            $this->assertEquals(2.3524096152432, $cosh, '', 1E-8);
        }

        /**
         * Test of hyperbolic tangent
         */
        public function testTanh()
        {
            $tanh = Trigonometry::tanh(1.5);
            $this->assertEquals(0.9051482536448, $tanh, '', 1E-8);
        }


        /**
         * Test of hyperbolic secant
         */
        public function testSech()
        {
            $sech = Trigonometry::sech(1.5);
            $this->assertEquals(0.42509603494228, $sech, '', 1E-8);
        }

        /**
         * Test of hyperbolic cosecant
         */
        public function testCsch()
        {
            $csch = Trigonometry::csch(1.5);
            $this->assertEquals(0.46964244059522, $csch, '', 1E-8);
        }

        /**
         * Test of hyperbolic cotangent
         */
        public function testCoth()
        {
            $coth = Trigonometry::coth(1.5);
            $this->assertEquals(1.1047913929825, $coth, '', 1E-8);
        }

        /**
         * Test of hyperbolic arcsine
         */
        public function testAsinh()
        {
            $asinh = Trigonometry::asinh(1.2);
            $this->assertEquals(1.0159731341797, $asinh, '', 1E-8);
        }

        /**
         * Test of hyperbolic arccosine
         */
        public function testAcosh()
        {
            $acosh = Trigonometry::acosh(1.2);
            $this->assertEquals(0.62236250371478, $acosh, '', 1E-8);
        }

        /**
         * Test of hyperbolic arctangent
         */
        public function testAtanh()
        {
            $atanh = Trigonometry::atanh(0.2);
            $this->assertEquals(0.20273255405408, $atanh, '', 1E-8);
        }


        /**
         * Test of hyperbolic arcsecant
         */
        public function testAsech()
        {
            $asech = Trigonometry::asech(0.2);
            $this->assertEquals(2.2924316695612, $asech, '', 1E-8);
        }

        /**
         * Test of hyperbolic arccosecant
         */
        public function testAcsch()
        {
            $acsch = Trigonometry::acsch(1.2);
            $this->assertEquals(0.75848613719374, $acsch, '', 1E-8);
        }

        /**
         * Test of hyperbolic arccotangent
         */
        public function testAcoth()
        {
            $acoth = Trigonometry::acoth(1.2);
            $this->assertEquals(1.1989476363992, $acoth, '', 1E-8);
        }

    }
}
?>
