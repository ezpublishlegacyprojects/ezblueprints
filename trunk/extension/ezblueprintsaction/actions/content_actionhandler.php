<?php

function ezblueprintsaction_ContentActionHandler( &$module, &$http, &$objectID )
{

    if ( $http->hasPostVariable( "hello" ) )
    {
        echo $http->postVariable( "hello" );
        eZExecution::cleanExit();
    }
    return;
}

?>