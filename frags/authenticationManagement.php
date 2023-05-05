<?php
function session_start_once():void{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function isAuthenticated(): bool
{
    session_start_once();
    if (!isset($_SESSION["currentUser"])){
        return false;
    }
    return true;
}

function needsAuthentication():void
{
    if (!isAuthenticated())
        sendError("unauthenticated","login");
}

function needsNOAuthentication():void
{
    if (isAuthenticated())
        header("Location: homePage.php");
}
