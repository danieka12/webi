<?php

namespace Helpers;

interface MessageInterface
{
    public function getRequired(?String $field): String;
    public function getConfirmation(): String;
    public function getEmailValidation(): String;
    public function authenticationFailed(): String;
    public function emailHasBeenRegistered(): String;
}
