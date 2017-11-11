<?php


/**
 * General Helper
 *
 * This Helper will contain all general solutions for
 * the API, like reformat number, changes strings, etc.
 *
 * The Entries, Responses and details will be describe
 * on the header of their own function.
 */


/**
 * Return a Friendly DATE, Use it for Views
 *
 * @param  DateTmime $value
 * @return string
 */
function returnFriendlyDate($value) {
    return \Carbon\Carbon::parse($value)->format('d-m-Y');
}


/**
 * Return a Friendly URL, Use it for Menu.
 *
 * @param  string $text
 * @return string
 */
function returnFriendlyUrl($text)
{
    $letters = array(
        '–', '—', '"', '"', '"', '\'', '\'', '\'',
        '«', '»', '&', '÷', '>',    '<', '$', '/'
    );

    $text = str_replace($letters, " ", $text);
    $text = str_replace("&", "and", $text);
    $text = str_replace("?", "", $text);
    $text = strtolower(str_replace(" ", "-", $text));

    return ($text);
}


/**
 * Return error array
 *
 * @param  string $message
 * @return json
 */
function returnError($message)
{
    //Return Json Response On Error.

    $resp['success'] = false;
    $resp['message'] = $message;
    return $resp;
}


/**
 * Format response into json.
 * This method will control all exits from this API.
 *
 * The API will controll all errors, procuce on execution of any event.
 * If the aplcation can not control some error produces from Laravel
 * those one will be manage on handler.php
 *
 * Error Code that will be managed.
 * 200 – OK – Eyerything is working
 * 404 - Not found – There is no resource behind the URI.
 * 422 - Unprocessable Entity - Not a valid data (Cloud be Forms Ex. mandatory fields are missing)
 *
 * EXIT - Always will be contain this information.
 * success: True or False
 * message: Message in case of error.
 * data: Data response from a method.
 *
 * @param $response
 * @param $message - Error Message
 * @param $error - Error Code Send from controller.
 */
function formatJsonResponse($response, $message = null, $error = null)
{
    if ($response && is_null($error)) {
        $data['success'] = true;
        $data['result'] = [$response];

        return response()->json($data);
    } elseif (!is_null($error) && !is_null($message)) {
        //Means there is an error.
        $data['success'] = false;
        $data['message'] = $message;
        return response()->json($data, $error);
    } else {
        $data['success'] = false;
        $data['message'] = 'Resource unavailable';
        return response()->json($data, 404);
    }
}



/**
 * Format Number for Payment Information
 *
 * @param  integer $number
 * @return integer $number
 */
function formatNumberToBank($number)
{
    $res = number_format($number, 2, '', '');
    return $res;
}



