<?php
 
class eZBluePrintsWorkflowEventType extends eZWorkflowEventType {
    const WORKFLOW_TYPE_STRING = "ezblueprintsworkflowevent";
 
    function eZBluePrintsWorkflowEventType() {
        $this->eZWorkflowEventType(eZBluePrintsWorkflowEventType::WORKFLOW_TYPE_STRING, "eZBluePrintsWorkflowEvent");
        /* define trigger here */
        $this->setTriggerTypes(array('content' => array('publish' => array('after'))));
    }
 
    function execute($process, $event) {
        /* code goes here */
        echo "Hello Event";
        eZExecution::cleanExit();
        //return eZWorkflowType::STATUS_ACCEPTED;
    }
 
}
 
eZWorkflowEventType::registerEventType(eZBluePrintsWorkflowEventType::WORKFLOW_TYPE_STRING, "eZBluePrintsWorkflowEventType");
?>