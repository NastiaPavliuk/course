<?php
include 'readStudentFromDB.php';
function doTable($arrayOfHeaders,$arrayOFValues,$groupAccess)
{
    $table="";
    if(is_array($arrayOfHeaders) && is_array($arrayOFValues))
    {
        $table.='<table cellspacing="0" class="table table-hover"><thead style="background-color: #f4f3f37d"><tr>';
        foreach($arrayOfHeaders as $column)
        {
            $table.='<th width="14%" class="theader" style="text-align: center; font-weight: bold">'.$column.'</th>';
        }
        $table.='</tr></thead><tbody>';
        foreach ($arrayOFValues as $rows)
        {
            if (is_array($rows)&&$rows[0]!=null)
            {
                $table .='<tr>';
                foreach ($rows as $value)
                {
                    if(isset($_SESSION['register']))
                        $table .= "<td align='center'><a href='../views/student-card.php?group=$groupAccess&name=\"$value\"' >" . $value . '</a></td>';
                    else $table .='<td align="center">' . $value . '</td>';
                }
                $table .='</tr>';

            }
            else if(!is_array($rows)&& $rows!=null)
            {
                $table .= '<tr>';
                $table .= '<td align="center">' . $rows . '</td>';
                $table .= '</tr>';
            }
        }
        $table .= '</tbody></table>';
    }
    return $table;
}

?>