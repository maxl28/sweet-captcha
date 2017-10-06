<?php namespace maxl28\SweetCaptcha;

use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Input;

/**
 * Custom class validator for the Sweet Captcha inputs
 * 
 */
class SweetCaptchaValidator extends Validator {

    /**
     * Validation method for the Sweet Captcha input values.
     * @param  [type] $attribute  [description]
     * @param  [type] $value      [description]
     * @param  [type] $parameters [description]
     * @return boolean            
     */
    public function validateSweetcaptcha($attribute, $value, $parameters)
    {

        if (Input::has('scvalue'))
        {	
        	$sweetcaptcha = app()->make('SweetCaptcha');        	
        	return $sweetcaptcha->check(array('sckey' => $value, 'scvalue' => Input::get('scvalue'))) == "true";
    	}
    	else
    		return false;
    }

}