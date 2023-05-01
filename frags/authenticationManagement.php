<?php
function isAuthenticated(): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
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
