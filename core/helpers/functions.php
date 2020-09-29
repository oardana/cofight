<?php 

function validate($arr_input, $arr_rules) {
    $error = [];
    
    foreach($arr_input as $input_name => $input_value) {
        foreach($arr_rules as $input_has_rules => $arr_rule) {
            if($input_name == $input_has_rules  && !isset($error[$input_name]) ) {
                $rules = explode('|', $arr_rule);
                foreach($rules as $each_rule) {
                    $rule = explode(':', $each_rule)[0];
                    $rule_value = explode(':', $each_rule)[1];
    
                    if($rule == 'required' && $rule_value == 'true') {
                        if($input_value == '') {
                            $error[$input_name] = $input_name . ' tidak boleh kosong';
                        }
                    }

                    if($rule == 'min') {
                        if(strlen($input_value) < $rule_value) {
                            $error[$input_name] = $input_name . ' minimal ' . $rule_value . ' karakter';                                
                        }
                    }

                    if($rule == 'max') {
                        if(strlen($input_value) > $rule_value) {
                            $error[$input_name] = $input_name . ' maksimal ' . $rule_value . ' karakter';                                
                        }
                    }

                    if($rule == 'email' && $rule_value == 'true') {
                        if(!strpos($input_value, '@')) {
                            $error[$input_name] = 'email tidak valid, harus menggunakan tanda @';
                        }
                    }

                    if($rule == 'equal') {
                        if($input_value != $arr_input[$rule_value]) {
                            $error[$input_value] = $input_name . ' dan ' . $rule_value . ' tidak cocok';
                        }
                    }
                }
            }
        }
    }
    return $error;
}

function flash_error_input($error_input) {
    foreach($error_input as $error_input_name => $error_input_value) {
        $_SESSION['error_input'][$error_input_name] = $error_input_value;
    }
}

function flash_old_input($old_input) {
    foreach($old_input as $old_input_name => $old_input_value) {
        $_SESSION['old_input'][$old_input_name] = $old_input_value;
    }
}

function clearSessionErrorInput() {
    if(isset($_SESSION['error_input'])) {
        unset($_SESSION['error_input']);
    }

    if(isset($_SESSION['old_input'])) {
        unset($_SESSION['old_input']);
    }
}

function old($input_name) {
    return (isset($_SESSION['old_input'][$input_name])) ? $_SESSION['old_input'][$input_name] : null;
}

function error($error_input) {
    return (isset($_SESSION['error_input'][$error_input])) ? $_SESSION['error_input'][$error_input] : null;
}

function insertToDB($table_name, $data_arr) {
    global $conn;
    foreach($data_arr as $data_key => $data_value) {
        $column_arr[] = $data_key;
        $values_arr[] = "'$data_value'";
    }

    $column = join(', ', $column_arr);
    $values = join(', ', $values_arr);
    $sql = "INSERT INTO $table_name ($column) VALUES($values)";
    $query = mysqli_query($conn, $sql);
}
