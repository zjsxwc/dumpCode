<?php
$a1 = ["a","b","c"];
$a2 = ["i","j","o"];
$a3 = ["x","y","z"];
function arraysFullCombination() {
    $arrays = func_get_args();
    $result = [];
    $currentArrayIndex = 0;
    $currentArrayValueIndex = 0;
    $workingOn = [];
    while(1){
        array_push(
            $workingOn,
            [
                "currentArrayIndex" => $currentArrayIndex,
                "currentArrayValueIndex" => $currentArrayValueIndex,
                "value" => $arrays[$currentArrayIndex][$currentArrayValueIndex]
            ]
        );
        $currentArrayIndex++;
        $currentArrayValueIndex = 0;
        if ($currentArrayIndex >= count($arrays)) {
            $workResult = [];
            foreach ($workingOn as $workResultValue){
                $workResult[] = $workResultValue["value"];
            }
            $result[] = $workResult;
            $popedWork = array_pop($workingOn);
            $currentArrayIndex--;
            $currentArrayValueIndex = $popedWork["currentArrayValueIndex"]+1;
            while ($currentArrayValueIndex >= count($arrays[$currentArrayIndex])) {
                $popedWork = array_pop($workingOn);
                $currentArrayIndex--;
                $currentArrayValueIndex = $popedWork["currentArrayValueIndex"]+1;
                if ( ($currentArrayIndex == 0) && ($currentArrayValueIndex >= count($arrays[0])) ) {
                    goto end;
                }
            }
        }
    }
    end:
    return $result;
}
var_dump(arraysFullCombination($a1,$a2,$a3));
