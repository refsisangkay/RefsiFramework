<?php
ref_function('my-function');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if(!isset($err))
        {
            $query = db_delete("voucher", ["id_voucher", $id]);
            if($query){
                $msg = "Data Voucher Berhasil Dihapus";
                $_SESION['flashdata'] = array('type' => 'success', 'message' => $msg);
                ref_redir('akun/voucher?msg=' . $msg);
            } else {
                $msg = mysqli_error($db);
                $_SESION['flashdata'] = array('type' => 'success', 'message' => $msg);
                ref_redir('akun/voucher?msg=' . $msg);
            }
        }else {
            $msg = implode(" ", $err);
            $_SESION['flashdata'] = array('type' => 'error', 'message' => $msg);
            echo $msg;
            ref_redir('akun/voucher?msg=' . $msg);
        }
    }else {
        $msg = "Data tidak ada";
        $_SESION['flashdata'] =  array('type' => 'error', 'message' => $msg);
        ref_redir('akun/user?msg=' . $msg);
    }

?>