<?php
//1.连接数据库
try{
	$pdo = new PDO("mysql:host=localhost; dbname=jkxy;", "root", ""); //初始化一个PDO对象
}catch(PDOException $e){
	die("数据库连接失败".$e->getMessage());
}

//2.通过action的值做对应的操作

switch($_GET['action']){
	case "add": //增加操作
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$classid = $_POST['classid'];

		$sql = "insert into stu values(null, '{$name}', '{$sex}', '{$age}', '{$classid}')";
		$rw = $pdo->exec($sql); //调用对象中的方法
		if($rw > 0){
			echo "<script>alert('增加成功');window.location='index.php'</script>";
		}else{
			echo "<script>alert('增加失败');window.history.back();</script>";
		}
		break;

	case "del":
		//window.location = 'action.php?action=del&id='+id;
		$id = $_GET['id'];
		$sql = "delete from stu where id={$id}";
		$pdo->exec($sql); //调用对象中的方法执行sql语句，返回的是影响的行数
		header("Location:index.php");
		break;

	case "edit":
		//1.获取表单信息
		$id = $_POST['id'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$classid = $_POST['classid'];

		//数字就不用加引号
		$sql = "update stu set name='{$name}', sex='{$sex}', age={$age}, classid={$classid} where id={$id}"; 
		$rw = $pdo->exec($sql);
		if($rw > 0){
			echo "<script>alert('修改成功');window.location='index.php'</script>";
		}else{
			echo "<script>alert('修改失败');window.history.back();</script>";
		}
		break;

}





























