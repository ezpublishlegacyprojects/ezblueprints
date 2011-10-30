<?php

class eZBluePrintsWorkflowEventType extends eZWorkflowEventType
{

    const WORKFLOW_TYPE_STRING = "ezblueprintsworkflowevent";

    function eZBluePrintsWorkflowEventType()
    {
        $this->eZWorkflowEventType( eZBluePrintsWorkflowEventType::WORKFLOW_TYPE_STRING, "eZBluePrintsWorkflowEvent" );

        // define here the triggers to which this event can be applied
        $this->setTriggerTypes(array('content' => array( 'publish' => array( 'after' ) ) ) );
    }

    // this method is called when the event is executed as part of a workflow
    function execute( $process, $event )
    {
        // to debug events, we have no GUI - it's a good idea to use the eZ debug log
        eZDebug::writeDebug( "Event " . self::WORKFLOW_TYPE_STRING . ": started", __METHOD__ );

        // the parameters which the event can use are found in the $process variable.
        $parameters = $process->attribute( 'parameter_list' );

        // since this is an event working on publish/after, we have the following available:
        $objectID = $parameters['object_id'];
        $versionID = $parameters['version'];

        // here do some work...

        // at the end, continue with execution  of the rest of the workflow
        // look up more return codes in the eZWorkflowType class
        return eZWorkflowType::STATUS_ACCEPTED;
    }

}

eZWorkflowEventType::registerEventType( eZBluePrintsWorkflowEventType::WORKFLOW_TYPE_STRING, "eZBluePrintsWorkflowEventType" );

?>