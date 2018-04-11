<?php

function doUsersTable($arrayOfHeaders,$arrayOFValues)
{
    $table="";
    if(is_array($arrayOfHeaders) && is_array($arrayOFValues))
    {
        $table.='<table cellspacing="0" class="table table-hover"><thead><tr>';
        foreach($arrayOfHeaders as $column)
        {
            $table.='<th width="14%" class="theader">'.$column.'</th>';
        }
        $table.='</tr></thead><tbody>';
        foreach ($arrayOFValues as $rows)
        {
            if (is_array($rows)&&$rows[0]!=null)
            {
                $table .='<tr>';
                for($i=0; $i<4; $i++)
                {
                    if($i==0) $table .="<td><input type='text' class='form-control' name='name' disabled value='$rows[$i]'></td>";
                    if($i==1) {
                        $table .="<td><input type='text' class='form-control' name='email' disabled value='$rows[$i]'></td>";
                        $curMail = $rows[$i];
                    }
                    if($i==2) $table .="<td><input type='text' class='form-control' name='group' disabled value='$rows[$i]'></td>";
                    if($i==3 && $rows[$i]==1) $table .="<td><a class='btn btn-danger' href='../views/accessPage.php?unaccess=\"$curMail\"/'>Забрати доступ</a></td>";
                    if($i==3 && $rows[$i]==0) $table .="<td><a class='btn btn-success' href='../views/accessPage.php?access=\"$curMail\"/'>Дати доступ</a></td>";

                }
                $table .='</tr>';

            }
            else if(!is_array($rows)&& $rows!=null)
            {
                $table .= '<tr>';
                $table .= '<td>' . $rows . '</td>';
                $table .= '</tr>';
            }
        }
        $table .= '</tbody></table>';
    }
    return $table;
}
?>