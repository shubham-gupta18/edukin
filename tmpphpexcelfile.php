	
	<?php
	session_start();
	$sub=$_SESSION['sub'];
$conn=mysqli_connect("localhost","root","","self") or die("Error in connection");
$query="select max(master_fk) from formeducation_details";
$res=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($res))
{
$id=$row[0];
}


$query="SET GLOBAL group_concat_max_len=4294967295";
$result=mysqli_query($conn,$query);
$query="SELECT CONCAT('SELECT master_fk, ', (SELECT GROUP_CONCAT(DISTINCT  CONCAT('MAX(IF(formkey = ''', formkey,''', formvalue, NULL)) AS ', formkey)) FROM formeducation_details where master_fk='$id'), ' FROM formeducation_details GROUP BY master_fk') as qry limit 0,1";
$result=mysqli_multi_query($conn,$query) or die("sorry");


if($result)
{
if($result=mysqli_store_result($conn))
	{
	while ($row=mysqli_fetch_row($result))
        {
       	     $tmp=$row[0];
        }
        $result=mysqli_query($conn,$tmp);
        while($row=mysqli_fetch_assoc($result))
        {
        	$data[]=$row;
        }
        
echo "<table border=2 align=center cellpadding=20 cellspacing=10>";
echo "<tr>";	
echo "<th>Sl no.</th>";
while($field=mysqli_fetch_field($result))
{
$col[]=$field->name;
if($field->name=="id" || $field->name=="batchid" || $field->name=="createdateon" || $field->name=="master_fk") 
{
echo "";
}
else
{
echo "<th>".ucwords($field->name)."</th>";
}
}
foreach($col as $k=>$v)
{
if($v!="master_fk" and $v!="Name" and $v!="Reg" and $v!="physical_education")
$cols[]=$v;
}	
echo "<th>Action</th>";
echo "<pre>";
print_r($cols);
print_r($sub);
if(array_diff($cols,$sub))
{
echo $flag="true";
}
else{
echo $flag="false";
}

if($flag!="true")
{
echo "if";
$i=1;
foreach($data as $k=>$v)
        {

        echo "<tr>";
        echo "<td>".$i++."</td>";
        foreach($col as $key=>$val)
        {
        if($val=="id" || $val=="batchid" || $val=="createdateon" || $val=="master_fk") 
        {
        echo "";
        }
        else
        {
        echo "<td>".$v[$val]."</td>";
        }
        }
        echo "<td>"."<a href='#'>Remove</a>"."</td>";
        echo "</tr>";
        }
}
else{
echo "else";
$i=1;
foreach($data as $k=>$v)
        {
       if($v['master_fk']==$id)
        {
        echo "<tr>";
        echo "<td>".$i++."</td>";
        foreach($col as $key=>$val)
        {
        if($val=="id" || $val=="batchid" || $val=="createdateon" || $val=="master_fk") 
        {
        echo "";
        }
        else
        {
        echo "<td>".$v[$val]."</td>";
        }
        }
        echo "<td>"."<a href='#'>Remove</a>"."</td>";
        echo "</tr>";
        }
        }
}
/*while($row=mysqli_fetch_assoc($result))
{
	$idc=$row['batchid'];
	if($row['status']=="fail")
	{
	echo "<tr bgcolor='#ff8080'>";
	echo "<td>".$i++."</td>";
	foreach($col2 as $k=>$v)
	{
	echo "<td>".$row[$v]."</td>";
	}
	echo "</tr>";
	}
	else
	{
	echo "<tr>";
	echo "<td>".$i++."</td>";
	foreach($col2 as $k=>$v)
	{
	echo "<td>".$row[$v]."</td>";
	}
	echo "</tr>";
	}
		
}*/
}
}

?>	