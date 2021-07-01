<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DiscountPercentage implements Rule
{
    private $previousAttribute;
    private $previousValue;
    private $condition;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($previousAttribute, $previousValue)
    {
        $this->previousAttribute = $previousAttribute;
        $this->previousValue = $previousValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(is_numeric(request($this->previousAttribute)) && request($this->previousAttribute) == $this->previousValue){
            return $value <= 100;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':Attribute must be less than or equals 100%';
    }
}
