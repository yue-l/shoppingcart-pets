<?php
namespace helpers;

/**
 * ShoppingCart model class for resolving raw data char issues
 */
class CustomDataProcessor
{
    /**
     * put imported data into the correct format for application process.
     * @method standardizeRawData
     * @param  array             $data raw data provided via PDF requirement
     * @return array                   a formatted array of products
     */
    public static function standardizeRawData($data)
    {
        $formattedOutput = array();
        foreach($data as $temp) {
            $numOfKeys = count(array_keys($temp));
            $numOfValues = count(array_values($temp));

            // possible error handler
            if($numOfKeys != $numOfValues) {

                die("Raw data index does not match to its value");
            }
            // get keys data
            $formattedKeys = self::convertSpecialChars(array_keys($temp));
            // get values data
            $formattedValues = self::convertSpecialChars(array_values($temp));
            // standaradized array holder
            $newTempFormat = array();
            for($i = 0; $i < $numOfKeys; $i++) {
                if($formattedKeys[$i] == 'price') {
                    // handle price
                    $newTempFormat[$formattedKeys[$i]] = number_format($formattedValues[$i], 2, '.', '');
                } else {
                    // handle string
                    $newTempFormat[$formattedKeys[$i]] = $formattedValues[$i];
                }
            }
            $formattedOutput[] = (object) $newTempFormat;
        }

        return $formattedOutput;
    }

    /**
     * convert unwanted characters with replacement
     * @method convertSpecialChars
     * @param  string              $string provided string from supplied array
     * @return string                      formatted string
     */
    static function convertSpecialChars($string)
    {
        $specialCharArray = array(
            "/“/",
            "/”/",
        );

        return preg_replace($specialCharArray, '', $string);
    }
}
