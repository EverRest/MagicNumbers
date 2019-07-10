<?php

/**
 * Class MagicNumberClass
 */
final class MagicNumberClass
{
    const STR_LENGTH = 6;

    /**
     * @var MagicNumberClass
     */
    private static $instance;

    /**
     * Get the instance via lazy initialization
     */
    public static function getInstance(): MagicNumberClass
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param int $num
     * @return bool
     */
    public function checkIsMagic(int $num =  0): bool
    {

        $str = $this->fromNumToString($num);
        $left =  substr($str, 0, self::STR_LENGTH/2);
        $right =  substr($str, self::STR_LENGTH/2, self::STR_LENGTH/2);

        return $this->sumNumbers($left) === $this->sumNumbers($right);
    }

    /**
     * @param int $num
     * @return string
     */
    private function fromNumToString (int $num): string
    {
        $str = (string) $num;

        while (strlen($str) < self::STR_LENGTH) {
            $str = '0' . $str;
        }

        return $str;
    }

    /**
     * @param string $str
     * @return int
     */
    private function sumNumbers (string $str = ''): int
    {
        $arrNum = str_split($str);
        $sum = 0;
        foreach ($arrNum as $num) {
            $sum += (int) $num;
        }
        if ($sum > 9) {
            $sum = $this->sumNumbers( (string) $sum);
        }
        return $sum;
    }

    /**
     * MagicNumberClass constructor.
     */
    private function __construct()
    {
    }

    /**
     * private clone
     */
    private function __clone()
    {
    }

    /**
     * private wakeup
     */
    private function __wakeup()
    {
    }
}