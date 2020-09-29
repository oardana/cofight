<?php 

function register($data) {
    $error = validate($data, [
        'nama'      => 'max:50|min:3|required:true',
        'email'     => 'max:50|min:1|required:true|email:true',
        'password'  => 'min:8|max:20|required:true|equal:konfirmasi_password',
    ]);

    if(!empty($error)) {
        flash_error_input($error);
        flash_old_input($data);
        header('Location: ./register.php');
        exit();
    } else {
        insertToDB('users', [
            'nama'      => $data['nama'],
            'email'     => $data['email'],
            'password'  => $data['password'],
        ]);
    }
}