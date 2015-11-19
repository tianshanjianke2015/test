<?php    
$dbh = new PDO('pgsql:host=localhost;dbname=postgres', 'postgres', '');      
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

/*添加*/    
//$sql = "INSERT INTO testtab1 SET login=:login AND password=:password";     
$sql = "INSERT INTO testtab1 (id ,t)VALUES (:id, :t)";  
$stmt = $dbh->prepare($sql);  
$stmt->execute(array(':id'=>5,':t'=>'LYS'));      
var_dump($stmt);     

/*修改*/    
$sql = "UPDATE testtab1 SET t=:t WHERE id=:id";      
$stmt = $dbh->prepare($sql);      
$stmt->execute(array(':id'=>'5', ':t'=>'lys'));      
echo $stmt->rowCount();     

/*删除*/    
$sql = "DELETE FROM testtab1 WHERE t LIKE 'LYS%'"; //kevin%      
$stmt = $dbh->prepare($sql);      
$stmt->execute();      
echo $stmt->rowCount();      

/*查询*/    
$t = 'bar%';      
$sql = "SELECT * FROM testtab1 WHERE t LIKE :t";      
$stmt = $dbh->prepare($sql);      
$stmt->execute(array(':t'=>$t));      
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){         
 print_r($row);      
}          

$sql = "SELECT * FROM testtab1";
$stmt = $dbh->query($sql);
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){         
 print_r($row);      
}          
 
?>    
