<?php
/**
 * Created by PhpStorm.
 * User: I816
 * Date: 21/02/2019
 * Time: 08.13
 */

if (!function_exists('to_lower')) {
    /**
     * @param string $str
     * @return string
     */
    function to_lower(string $str)
    {
        return strtolower($str);
    }
}

if (!function_exists('to_upper')) {
    /**
     * @param string $str
     * @return string
     */
    function to_upper(string $str)
    {
        return strtoupper($str);
    }
}

if (!function_exists('now')) {
    /**
     * @return static
     */
    function now()
    {
        return \Carbon\Carbon::now();
    }
}

if (!function_exists('modified_time')) {
    /**
     * @param \Illuminate\Database\Eloquent\Collection $dates
     * @param string $format
     * @return string|null
     */
    function modified_time($dates, string $format = 'd/M/Y H:i:s A')
    {
        if (isset($dates->created_at) && isset($dates->updated_at)) {
            $last_modified = (is_null($dates->updated_at)) ? $dates->created_at : $dates->updated_at;

            return $last_modified->format($format);
        }

        return null;
    }
}

if (!function_exists('date_formatted')) {
    /**
     * @param string $date
     * @param string $format
     * @param string|null $locale
     * @return string
     * @throws Exception

     */
    function date_formatted(string $date, string $format = '%A, %e %B %Y', string $locale = null)
    {
        $locale = !is_null($locale) ? $locale : config('app.locale');
        setlocale(LC_TIME, $locale);

        if ($date instanceof \Carbon\Carbon)
            return $date->formatLocalized($format);

        return (new \Carbon\Carbon($date))->formatLocalized($format);
    }
}

if (!function_exists('month_name')) {
    /**
     * @param int $month
     * @param string $format
     * @param string|null $locale
     * @return string
     */
    function month_name(int $month, string $format = '%B', string $locale = null)
    {
        $locale = !is_null($locale) ? $locale : config('app.locale');
        setlocale(LC_TIME, $locale);

        return \Carbon\Carbon::create(null, $month)->formatLocalized($format);
    }
}



if (!function_exists('nip')) 
{
    function nip(string $str)
    {
            return date('y').".".date('y',strtotime($str)).".".date('d',strtotime($str)).date('s');
    }
}



if (!function_exists('to_dropdown')) {

    function to_dropdown(string $str)
    {
        
        $optiongroup = \App\MasterModel\OptionGroup::where('name',$str)->first();

        return $optionvalue = \App\MasterModel\OptionValue::where('option_group_id',$optiongroup->id)->orderby('sequence')->pluck('value','key')->all();
    }

}

if (!function_exists('opval')) {

    function opval(string $og,string $op)
    {
        
        $optiongroup = \App\MasterModel\OptionGroup::where('name',$og)->first();
        $optionvalue = \App\MasterModel\OptionValue::select('value')->where('option_group_id',$optiongroup->id)->where('key',$op)->first();
        
        if($og=='Status')
        {   
            $opval=$op == 'T' ? '<span class="badge badge-success">'.$optionvalue->value.'</span>' : '<span class="badge badge-danger">'.$optionvalue->value.'</span>';
            return $opval;

        }
        else
        {
            return $optionvalue->value;    
        }

    }

}



if (!function_exists('number_to_roman')) {
    /**
     * @param int $number
     * @return string
     */
    function number_to_roman(int $number)
    {
        $map = [
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10,
            'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ];
        $returnValue = '';

        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }

        return $returnValue;
    }
}
?>