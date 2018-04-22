<?php

function makeSelect($selected, $disable=false){
    if($disable)
        $select = "<select name='groupNum' disabled class='form-control groupNum' required>";
    else $select = "<select name='groupNum' class='form-control groupNum' required>";
    if($selected=='102')
        $select .= "<option selected value='102'>102</option>";
    else $select .= "<option value='102'>102</option>";
    if($selected=='202')
        $select .= "<option selected value='202'>202</option>";
    else $select .= "<option value='202'>202</option>";
    if($selected=='302')
        $select .= "<option selected value='302'>302</option>";
    else $select .= "<option value='302'>302</option>";
    if($selected=='322')
        $select .= "<option selected value='322'>322</option>";
    else $select .= "<option value='102'>322</option>";
    if($selected=='402')
        $select .= "<option selected value='402'>402</option>";
    else $select .= "<option value='402'>402</option>";
    if($selected=='422')
        $select .= "<option selected value='422'>422</option>";
    else $select .= "<option value='422'>422</option>";
    if($selected=='502')
        $select .= "<option selected value='502'>502</option>";
    else $select .= "<option value='502'>502</option>";
    if($selected=='602')
        $select .= "<option selected value='602'>602</option>";
    else $select .= "<option value='602'>602</option>";
    $select .= "</select>";
    return $select;
}
?>