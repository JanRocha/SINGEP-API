<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\TestDox;

use PHPUnit\Framework\TestCase;

/**
 * Prettifies class and method names for use in TestDox documentation.
 */
final class NamePrettifier
{
    /**
     * @var array
     */
    private $strings = [];

    /**
     * Prettifies the name of a test class.
     */
    public function prettifyTestClass(string $className): string
    {
        try {
            $annotations = \PHPUnit\Util\Test::parseTestMethodAnnotations($className);

            if (isset($annotations['class']['testdox'][0])) {
                return $annotations['class']['testdox'][0];
            }
        } catch (\ReflectionException $e) {
        }

        $result = $className;

        if (\substr($className, -1 * \strlen('Test')) === 'Test') {
            $result = \substr($result, 0, \strripos($result, 'Test'));
        }

        if (\strpos($className, 'Tests') === 0) {
            $result = \substr($result, \strlen('Tests'));
        } elseif (\strpos($className, 'Test') === 0) {
            $result = \substr($result, \strlen('Test'));
        }

        if ($result[0] === '\\') {
            $result = \substr($result, 1);
        }

        return $result;
    }

    public function prettifyTestCase(TestCase $test): string
    {
        $annotations                = $test->getAnnotations();
        $annotationWithPlaceholders = false;

        if (isset($annotations['method']['testdox'][0])) {
            $result = $annotations['method']['testdox'][0];

            if (\strpos($result, '$') !== false) {
                $annotation = $annotations['method']['testdox'][0];
                $result     = '';

                $providedData = $this->mapTestMethodParameterNamesToProvidedDataValues($test);

                foreach (\explode(' ', $annotation) as $word) {
                    if (\strpos($word, '$') === 0) {
                        $result .= $providedData[$word] . ' ';
                    } else {
                        $result .= $word . ' ';
                    }
                }

                $result = \trim($result);

                $annotationWithPlaceholders = true;
            }
        } else {
            $result = $this->prettifyTestMethod($test->getName(false));
        }

        if ($test->usesDataProvider() && !$annotationWithPlaceholders) {
            $result .= ' data set "' . $test->dataDescription() . '"';
        }

        return $result;
    }

    /**
     * Prettifies the name of a test method.
     */
    public function prettifyTestMethod(string $name): string
    {
        $buffer = '';

        if (!\is_string($name) || $name === '') {
            return $buffer;
        }

        $string = \preg_replace('#\d+$#', '', $name, -1, $count);

        if (\in_array($string, $this->strings)) {
            $name = $string;
        } elseif ($count === 0) {
            $this->strings[] = $string;
        }

        if (\strpos($name, 'test_') === 0) {
            $name = \substr($name, 5);
        } elseif (\strpos($name, 'test') === 0) {
            $name = \substr($name, 4);
        }

        if ($name === '') {
            return $buffer;
        }

        $name[0] = \strtoupper($name[0]);

        if (\strpos($name, '_') !== false) {
            return \trim(\str_replace('_', ' ', $name));
        }

        $max        = \strlen($name);
        $wasNumeric = false;

        for ($i = 0; $i < $max; $i++) {
            if ($i > 0 && \ord($name[$i]) >= 65 && \ord($name[$i]) <= 90) {
                $buffer .= ' ' . \strtolower($name[$i]);
            } else {
                $isNumeric = \is_numeric($name[$i]);

                if (!$wasNumeric && $isNumeric) {
                    $buffer .= ' ';
                    $wasNumeric = true;
                }

                if ($wasNumeric && !$isNumeric) {
                    $wasNumeric = false;
                }

                $buffer .= $name[$i];
            }
        }

        return $buffer;
    }

    private function mapTestMethodParameterNamesToProvidedDataValues(TestCase $test): array
    {
        $reflector          = new \ReflectionMethod(\get_class($test), $test->getName(false));
        $providedData       = [];
        $providedDataValues = $test->getProvidedData();
        $i                  = 0;

        foreach ($reflector->getParameters() as $parameter) {
            $providedData['$' . $parameter->getName()] = $providedDataValues[$i++];
        }

        return $providedData;
    }
}
