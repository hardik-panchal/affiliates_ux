<?php

/**
 * General Functions
 * @version 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */

/**
 * Function to check whether variable is set or not.
 * @param String $var
 * @return Boolean
 * 

 * @version 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */
function _set($var) {
    return isset($var) && $var ? true : false;
}

/**
 * Checks if variable is set or not. if
 * variable is not set, it will reutnr second arc
 * @param String $var
 * @param String $var
 * @return String $var
 * 

 * @version 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */
function _e(&$s, $a = null) {
    return !empty($s) ? $s : $a;
}

/**
 * function to escape string
 * 
 * @param String $string
 * @return String escaped string

 * @version 1.0
 * @package BiOptimizers - FoxyCart
 */
function _escape($string) {
    $string = stripslashes($string);
    return mysql_real_escape_string(trim($string));
}

/**
 * Wrapper function for db insert query
 * 

 * @version 1.0
 * @package BiOptimizers - FoxyCart
 */
function qi($table, $fields, $operation = 'INSERT') {
    $db = Db::__d();
    return $db->insert_query($table, $fields, $operation);
}

function qd($table, $condition) {
    $db = Db::__d();
    return $db->delete_query($table, $condition);
}

function q($query) {
    $db = Db::__d();
    return $db->format_data($db->query($query));
}

function qs($query) {
    $result = q($query);
    return $result[0];
}

/**
 * Wrapper function for db update query
 * 

 * @version 1.0
 * @package BiOptimizers - FoxyCart
 */
function qu($table, $fields, $condition) {
    $db = Db::__d();
    return $db->update_query($table, $fields, $condition);
}

/**
 * Return date format that mysql likes YYYY-MM-DD H:I:S
 * 
 * @param String $timestamp optional unixtimestamp
 * @return String $date
 * 

 * @version 1.0
 * @package BiOptimizers - FoxyCart
 */
function _mysqlDate($timestamp = 0) {
    $timestamp = $timestamp ? $timestamp : time();
    return date('Y-m-d H:i:s');
}

function _getInstance($url) {
    $arg = explode("/", $url);
    switch ($arg[0]) {
        case 'admin':
            _cg('url', _e($arg[1], "home"));
            _cg("url_instance", $arg[0]);
            _cg("instance", "admin");
            break;
        default:
            if ($arg[0] != '') {
                $url_d = $arg[0];
            } else {
                $url_d = 'home';
            }
            _cg('url', $url_d);
            _cg("url_instance", '');
            _cg("instance", "front");

            if ($arg[1]) {
                array_shift($arg);
                _cg("url_vars", $arg);
            }
    }
}

/**
 *  Wrapper function for application level
 *  global variable
 * 
 *  set/get key/value
 * 
 *  @param String $key key
 *  @param $value value
 * 
 *  @return Array 
 * 
 */
function _cg($key, $value = null) {

    if (is_null($value)) {
        return Config::$_vars[$key];
    } else {
        Config::$_vars[$key] = $value;
    }
}

/**
 *  Wrapper function for application level
 *  global variable
 * 
 *  set/get key/value
 * 
 *  @param String $key key
 *  @param $value value
 * 
 *  @return Array 
 * 
 */
function _cgd($key, $value = null) {

    if (is_null($value)) {

        return Config::$_vars[$key];
    } else {
        Config::$_vars[$key] = $value;
    }
}

function lr($url) {
    //return "?q={$url}";
    return _U . $url;
}

function l($url) {
    print lr($url);
}

function d($arr, $hideStyle = "block") {
    if (is_array($arr) || is_object($arr)) {
        print "<pre style='display:{$hideStyle}'>" . "...";
        print_r($arr);
        print "</pre>";
    } else {
        print "<div class='debug' style='display:{$hideStyle}'>Debug:<br>$arr</div>";
    }
}

function _R($url) {
    header("Location:{$url}");
    exit;
}

function _auth_url($pages, $return_page) {
    if (!$_SESSION['user'] && in_array(_cg("url"), $pages)) {
        _cg("url", $return_page);
    }
}

function _level_auth_url($pages, $return_page) {

    if (!in_array(_cg("url"), $pages)) {
        _cg("url", $return_page);
    }
}

function back_trace() {
    $array = debug_backtrace();
    $output = 'Execution Backtrace:<br><ul>';
    foreach ($array as $debug_data) {
        $output .= "<li><b> " . $debug_data['file'] . "</b> [ Line : <b>" . $debug_data['line'] . "</b> ] <br></li>";
    }
    $output .= '</ul>';
    d($output);
}

function random_string() {
    return date("ymd") . mt_rand(1, 1000) . mt_rand(99, 99999);
}

function _escapeArray($array) {
    $array = array_map('mysql_real_escape_string', $array);
    return array_map('trim', $array);
}

function _bindArray($array, $map) {
    $return = array();
    foreach ($map as $form_field => $db_field) {
        $return[$db_field] = $array[$form_field];
    }
    return $return;
}

function _normalDate($date) {
    return date("d-M-Y H:i a", strtotime($date));
}

function json_die($status = true, $array = array()) {
    $response = array();
    $response['status'] = $status;
    $response['data'] = $array;
    die(json_encode($response));
}

function _errors_on() {
    ini_set("display_errors", "on");
    error_reporting(E_ALL);
}

function _errors_off() {
    ini_set("display_errors", "off");
    error_reporting(0);
}

function clearNumber($number) {
    return str_replace(array("-", "(", ")", " "), array("", "", "", ""), $number);
}

function getTimeZoneTime($timeZone, $time = '') {
    $current_time = new Datetime($time);
    $ny_time = new DateTimeZone($timeZone);
    $current_time->setTimezone($ny_time);

    $current_time = new DateTime($current_time->format("Y-m-d H:i:s"));

    return $current_time;
}

/**
 * Conditional Print
 */
function _cprint($key, $value, $print, $doPrint = true) {

    if ($key == $value) {
        if ($doPrint) {
            print $print;
        } else {
            return $print;
        }
    }
}

function _renderOptions($options, $selected_value) {
    foreach ($options as $optionValue => $label) {
        $selected = _cprint($optionValue, $selected_value, 'selected', false);
        print "<option value='{$optionValue}' {$selected}>{$label}</option> ";
    }
}

//Decrypt Data From Source
function foxycart_decrypt($src) {
    global $apikey;
    return rc4crypt::decrypt($apikey, urldecode($src));
}

/**
 * 
 */
function castString(&$item) {
    $item = (string) $item;
}

function _mail($to, $subject, $content, $extra = array()) {

    # unfortunately, need to use require within function.
    # swift lib overrides the autoloader 
    # and that stops native app classes being resolved and included

    require_once _PATH . 'lib/mail/swift/lib/swift_required.php';

    if (_isLocalMachine()) {
        //_l("To Email is overwritten by -  temp@go-brilliant.com  due to dev localmachine ");
        $to = 'temp@go-brilliant.com';
    }
    $bcc = 'hardikpanchal469@gmail.com';

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername(SMTP_EMAIL_USER_NAME)
            ->setPassword(SMTP_EMAIL_USER_PASSWORD);

    $mailer = Swift_Mailer::newInstance($transport);

    if (!is_array($to)) {
        $to = array($to);
    }


    if ($extra != '') {
        if (is_array($extra)) {
            
        } else {
            $extra = array($extra);
        }
    }

    if ($extra != '' && count($extra) > 0) {

        $message = Swift_Message::newInstance($subject)
                ->setFrom(array(MAIL_FROM_EMAIL => MAIL_FROM_NAME))
                ->setTo($to)
                ->setBcc($bcc)
                ->setBody($content, 'text/html', 'iso-8859-2');
        if (count($extra) > 0) {
            foreach ($extra as $each_extra):
                if (file_exists(_PATH . "quote_pdf/" . $each_extra)) {
                    $message->attach(Swift_Attachment::fromPath(_PATH . "quote_pdf/" . $each_extra));
                }
            endforeach;
        }
        //$attachment = Swift_Attachment::fromPath('/path/to/image.jpg')->setFilename('cool.jpg');
    } else {
        $message = Swift_Message::newInstance($subject)
                ->setFrom(array(MAIL_FROM_EMAIL => MAIL_FROM_NAME))
                ->setTo($to)
                ->setBcc($bcc)
                ->setBody($content, 'text/html', 'iso-8859-2');
    }



    $result = $mailer->send($message);

    return $result;
}

function _mailAffiliates($to, $subject, $content, $extra = array()) {

    # unfortunately, need to use require within function.
    # swift lib overrides the autoloader 
    # and that stops native app classes being resolved and included

    require_once _PATH . 'lib/mail/swift/lib/swift_required.php';

    if (_isLocalMachine()) {
        //_l("To Email is overwritten by -  temp@go-brilliant.com  due to dev localmachine ");
        $to = 'temp@go-brilliant.com';
    }
    $bcc = 'hardikpanchal469@gmail.com';

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername(SMTP_EMAIL_USER_NAME)
            ->setPassword(SMTP_EMAIL_USER_PASSWORD);

    $mailer = Swift_Mailer::newInstance($transport);

    if (!is_array($to)) {
        $to = array($to);
    }


    if ($extra != '') {
        if (is_array($extra)) {
            
        } else {
            $extra = array($extra);
        }
    }

    if ($extra != '' && count($extra) > 0) {

        $message = Swift_Message::newInstance($subject)
                ->setFrom(array(MAIL_FROM_EMAIL => MAIL_FROM_NAME))
                ->setTo($to)
                ->setBcc($bcc)
                ->setBody($content, 'text/html', 'iso-8859-2');
        if (count($extra) > 0) {
			
            foreach ($extra as $each_extra):
			
                if (file_exists(_PATH . "instance/front/media/uploads/" . $each_extra)) {
					
                    $message->attach(Swift_Attachment::fromPath(_PATH . "instance/front/media/uploads/" . $each_extra));
                }
            endforeach;
        }
        //$attachment = Swift_Attachment::fromPath('/path/to/image.jpg')->setFilename('cool.jpg');
    } else {
        $message = Swift_Message::newInstance($subject)
                ->setFrom(array(MAIL_FROM_EMAIL => MAIL_FROM_NAME))
                ->setTo($to)
                ->setBcc($bcc)
                ->setBody($content, 'text/html', 'iso-8859-2');
    }



    $result = $mailer->send($message);

    return $result;
}

function _isLocalMachine() {
    return IS_DEV_ENV; //$_SERVER['HTTP_HOST'] == 'localhost' ? true : false;
}

?>