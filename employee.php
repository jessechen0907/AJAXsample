<?php
header('Content-Type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
$staff=array(
	array('name'=>'Steven','number'=>'101','sex'=>'Male','job'=>'Manager'),
	array('name'=>'Jenny','number'=>'102','sex'=>'Female','job'=>'UI'),
	array('name'=>'Mike','number'=>'103','sex'=>'Male','job'=>'PM')
);
if($_SERVER['REQUEST_METHOD']=='GET'){
	search();
}elseif($_SERVER['REQUEST_METHOD']=='POST'){
	create();
}
// localhost:8080/ajaxdemo/emplpyee.php?number=10
function search(){
	/*$jsonp=$_GET["callback"];*/
	if(!isset($_GET['number'])||empty($_GET['number'])){
		echo '{"success":false,"msg":"参数错误"}';
		return;
	}
	global $staff;
	$number=$_GET['number'];
	$result='{"success":false,"msg":"此员工不存在"}';
	foreach($staff as $value){
		if($value['number']==$number){
			$result='{"success":true,"msg":"找到员工✿✿ヽ(°▽°)ノ✿编号：'.$value['number'].
																'，姓名：'.$value['name'].
																'，性别：'.$value['sex'].
																'，职位：'.$value['job'].'"}';
			break;
		}
	}
	echo $result;
}
/* 
	POST https://www.google.com.hk/
	Content-type: application/x-www-form-urlencoded
	POST_BODY:
	name=Nick&number=9091&sex=Male&job=UX

*/
function create(){
if(!isset($_POST['name'])||empty($_POST['name'])||!isset($_POST['number'])||empty($_POST['number'])||!isset($_POST['sex'])||empty($_POST['sex'])||!isset($_POST['job'])||empty($_POST['job'])){
	echo'{"success":false,"msg":"信息不全"}';
	return;
}
	echo'{"success":true,"msg":"员工'.$_POST['name'].'新增成功！"}' ;
}
?>