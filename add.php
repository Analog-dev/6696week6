<!DOCTYPE html>
<html lang="en">
    <?php
    include("conn.php");
    ?>
<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: "Mitr", serif;
        font-weight: 700px;
        font-style: normal;
        margin-left: 300px;
        margin-right: 300px;
        margin-top: 100px;
        text-align: center;
    }

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างฟอร์ม Bootstarp และเขียนโปรแกรมกับเงื่อนไข</title>
</head>

<body>
    <h1>โปรแกรมคำนวณและเงื่อนไข</h1> 
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="row mb-3">
    <label for="inputname" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputname" name="Name">
    </div>
   
  </div>
  <div class="row mb-3">
    <label for="inputnickname" class="col-sm-2 col-form-label">ชื่อเล่น</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputnickname"name="nickname">
      </div>
  </div>
  <div class="row mb-3">
    <label for="inputage" class="col-sm-2 col-form-label">อายุ</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputage" name="age">
    </div>
   </div> 
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
  <button type="reset" class="btn btn-danger">ยกเลิก</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST["Name"];
    $nickname=$_POST["nickname"];
    $age=$_POST["age"];

    //   ทำการเพิ่มข้อมมูล
    try {
        $sql = "INSERT INTO student (Name, nickname, age)
        VALUES ('$name', '$nickname', '$age')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "<div class='alert alert-success'>
        <strong>บันทึกสำเร็จ!</strong> คุณได้บันทึกข้อมูลเข้าใหม่ 1 รายการ.
        </div>";
      } catch(PDOException $e) {
        echo $sql . "บันทึกข้อมูลผิดพลาด<br>" . $e->getMessage();
      }
      
      $conn = null;
}
?>
</body>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>