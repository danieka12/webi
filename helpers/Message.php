<?php

namespace Helpers;

use Helpers\MessageInterface;

class Message implements MessageInterface
{
    public function getRequired(?String $field): String
    {
        if ($field) {
            return "$field tidak boleh kosong";
        }

        return "Field ini tidak boleh kosong";
    }

    public function getConfirmation(): String
    {
        return "Password konfirmasi anda tidak sama, Harap coba lagi kembali";
    }

    public function getEmailValidation(): String
    {
        return "Email yang anda masukkan tidak valid";
    }

    public function emailHasBeenRegistered(): String
    {
        return "Email yang anda masukkan sudah terdaftar";
    }

    public function authenticationFailed(): String
    {
        return "Email atau password yang anda masukkan salah";
    }
}
