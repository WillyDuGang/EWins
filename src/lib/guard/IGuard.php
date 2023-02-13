<?php

namespace src\lib\guard;

interface IGuard
{
    /**
     * @return bool
     */
    public function isAuthorized();

    /**
     * @return string
     */
    public function getErrorMessage();
}