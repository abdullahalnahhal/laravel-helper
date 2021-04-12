<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * user [fetches the current authenticated user]
 * @return null|Users\Models\User
 */

function user()
{
    if (Auth::guard('web')->check()) {
        return Auth::guard('web')->user();
    }elseif(Auth::guard('api')->check()){
        return Auth::guard('api')->user();
    }
}

/**
 * [isGuardA checks if the guard is the given guard]
 * @param  String  $guardName [description]
 * @return boolean
 */
function isGuardA(String $guardName = 'web'):bool
{
    return Auth::guard($guardName)->check();
}
/**
 * [requestWithUpload makes upload for file then returns a new request just with file name]
 * @param Request $request [object that has the http request]
 * @param string $name [file field name]
 * @return Request
 */
function requestWithUpload(Request $request, string $name):Request
{
    if (!$request->hasFile($name)) {
        return false;
    }
    $file = $request->{$name}->store('public');
    $new = $request->except($name);
    $new[$name] = basename($file);
    $request = new Request;
    $request->merge($new);
    return $request;
}
/**
 * [requestWithUploadArray makes multiple upload for file then returns a new request just with file name]
 * @param Request $request [object that has the http request]
 * @param string $name [file field name]
 * @return Request
 */
function requestWithUploadArray(Request $request, string $name):Request
{
    if (!$request->hasFile($name)) {
        return false;
    }
    $array = [];
    foreach ($request->{$name} as $uploadFile) {
        $file = $uploadFile->store('public');
        $array[] = basename($file);
    }
    $new = $request->except($name);
    $new[$name] = $array;
    $request = new Request;
    $request->merge($new);
    return $request;
}
/**
 * [nameLogo returns a string of a name with first letters]
 * @param string $name [name to make its logo]
 * @return string
 */
function nameLogo(string $name):string
{
    $words = explode(" ", $name);
    $logo = "";
    for ($i = 0; $i < 2; $i++) {
        if (isset($words[$i])) {
            $logo .= $words[$i][0] ?? "";
        }
    }
    return strtoupper($logo);
}
/**
 * [message return the api responses]
 * @param  boolean $status  [status true success false for failure]
 * @param  array   $data    [object will be sent]
 * @param  string  $message [message will be sent]
 * @param  integer  $code [for response code]
 * @return Response
 */
function message($status = true, $data = [], $message = '', $code = 200)
{
    return response()->json([
        'status' => $status,
        'data' => $data ?? [],
        'message' => $message,
        'code' => $code,
    ], $code);
}
/**
 * [colors returns random bootstrap color]
 * @param string $key [color key]
 * @return string [bootstrap color]
 */
function colors(string $key):string
{

    $colors = [
        'success', 'warning', 'primary', 'info', 'brand', 'danger'
    ];
    if (!isset($colors[$key])) {
        $key = $key % count($colors);
    }
    return $colors[$key];
}

/**
 * [excelColsByNumbers returns array of excel columns]
 * @param int $number [number of columns]
 * @return array [array of excel columns numbers]
 */
function excelColsByNumbers(int $number):array
{
    // all letters
    $cols = range("A", "Z");
    //max letters count
    if ($number < count($cols)) {
        $new_cols = array_slice($cols, 0, $number);
    } else {
        // if more then the max length
        $extra_letters = $number - count($cols);
        $new_cols = excelColsByNumbers($extra_letters);
        $counter = 0;
        foreach ($cols as $key2 => $col) {
            for ($i = 0; $i < $extra_letters - 1; $i++) {
                if ($counter < count($new_cols)) {
                    $counter++;
                    $cols[] = $col . $new_cols[$i];
                    continue;
                }
                break 2;
            }

        }
        $new_cols = $cols;
    }
    return $new_cols;
}

/**
 *[carbon instantiate Carbon ]
 * @param string $date
 * @return Carbon
 */
function carbon(string $date = null):Carbon
{
    if ($date){
        return new Carbon($date);
    }else{
        return new Carbon();
    }
}

/**
 * [isMultiDimentionalArray checks wether the array is multidimentional array or not]
 * @param array $array [array to be checked]
 * @return bool
 */
function isMultiDimentionalArray(array $array):bool
{
    if (count($array) == count($array, COUNT_RECURSIVE))
    {
      return false;
    }else{
      return true;
    }
}

/**
 * [array_flatten makes multidimentional array to be flat array]
 * @param array $array [array wanted to be converted]
 * @return array
 */
function array_flatten(array $array):array
{
    if (!is_array($array)) {
      return false;
    }
   $result = array();
   foreach ($array as $key => $value) {
     if (is_array($value)) {
        $result = array_merge($result, array_flatten($value));
        } else {
            $result = array_merge($result, array($key => $value));
        }
    }
    return $result;
}

/**
 * [trimAllSpaces removes all spaces from text]
 * @param string
 * @return string
 */
function trimAllSpaces(string $string):string
{
    $string = preg_replace('/\s+/', '', $string);
    return $string;
}

/**
 * [explodeCaps explode string on caps only]
 * @param string $string [string wanted to be exploded]
 * @return string
 */
function explodeCaps(string $string):string
{
    $pieces = preg_split('/(?=[A-Z])/',$string);
    return $pieces;
}

/**
 * [implodeToLower implode all array elements with lower case]
 * @param string $delimiter [string to implode by]
 * @param array $array [array to implode its elements]
 * @return string
 */
function implodeToLower(string $delimiter, array $array):string
{
    $string = implode($delimiter, array_map('strtolower', $array));
    return $string;
}

/**
 * [unsetByValue unset attribute from array using its value]
 * @param  array  $array [wanted to unset from]
 * @param  mixed $value [wanted to unset by]
 * @return array
 */
function unsetByValue(array $array, $value):array
{
    if (($key = array_search($value, $array)) !== false) {
        unset($array[$key]);
    }

    return $array;
}

/**
 * [ddSql makes dump for query that dump its sql and its bindings]
 * @param  Builder $query [query wanted to be dumped]
 * @return string
 */
function ddSql(Builder $query):string
{
    dd($query->toSql(), $query->getBindings());
}

/**
 * [toSqlWithBindings return sql query as string with its binding in single string]
 * @param  Builder $query [query builder wanted to get sql from]
 * @return string
 */
function toSqlWithBindings(Builder $query):string
{
    $sqlQuery = Str::replaceArray(
    '?',
    collect($query->getBindings())
        ->map(function ($i) {
            if (is_object($i)) {
                $i = (string)$i;
            }
            if (is_null($i)) {
                $i = 'null';
            }

            if ($i === false) {
                $i = 'false';
            }

            if ($i === true) {
                $i = 'true';
            }
            return (is_string($i)) ? "'$i'" : $i;
        })->all(),
    $query->toSql());

    return $sqlQuery;
}

/**
* [td makes dd with trace information]
* @return string
*/
function td():string
{
    $trace = debug_backtrace();
    echo '<pre style="background:#F2F2F2;border:solid 1px;padding:1em; font-size:12pt">';
    echo '<h2><u>Trace</u></h3>';
    echo '<b>file</b> : <span style="color:red">'.$trace[0]['file']."</span>";
    echo '<br><b>line</b> : <span style="color:blue">'.$trace[0]['line']."</span>";
    if (isset($trace[1]['function'])) {
        echo '<br><b>function</b> : <span style="color:blue">'.$trace[1]['function']."</span>";
    }
    if (isset($trace[1]['class'])) {
        echo '<br><b>class</b> : <span style="color:red">'.$trace[1]['class']."</span>";
    }
    echo '</pre>';
    echo '<h2><u>Dump</u></h3>';
    $args = func_get_args();
    if (!empty($args)) {  
        call_user_func('dd', ((count($args) > 1)? $args : $args[0]) );
    }else{
        dd();
    }
}

/**
 * [lDebug makes log debug wit readable tracing comments]
 * @param  string $msg [message wanted to debug with]
 * @return void
 */
function lDebug(string $msg):void
{
    $args = func_get_args();

    \Log::debug(' ########  Start DEBUG ####### ');
    $trace = debug_backtrace();
    \Log::debug(' FILE : '.$trace[0]['file'].'');
    \Log::debug(' LINE : '.$trace[0]['line'].'');
    \Log::debug(' FUNCTION : '.$trace[1]['function'].'');
    \Log::debug(' CLASS : '.$trace[1]['class'].'');
    if (is_array($args)) {
        foreach ($args as $string) {
            \Log::debug(' >>>>  Start Message <<<< ');
            \Log::debug($string);
            \Log::debug(' >>>>  END Message <<<< ');
        }
    }
    \Log::debug('########  End DEBUG #######');
}