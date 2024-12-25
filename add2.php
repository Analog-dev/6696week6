<!DOCTYPE html>
<html lang="en">
    <?php
    include("conn2.php");
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
    <label for="inputname" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputname" name="Name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputnickPublisher" class="col-sm-2 col-form-label">ชื่อสำนักพิมพ์</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputnickPublisher"name="Publisher">
      </div>
  </div>
  <div class="row mb-3">
    <label for="inputGenre" class="col-sm-2 col-form-label">ประเภท</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputGenre" name="Genre">
    </div>
  </div>
    <div class="row mb-3">
    <label for="inputPrice" class="col-sm-2 col-form-label">ราคา</label>
    <div class="col-sm-3">
      <input type="taxt" class="form-control" id="inputPrice" name="Price">
    </div>
  </div> 
  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
  <button type="reset" class="btn btn-danger">ยกเลิก</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST["Name"];
    $Publisher=$_POST["Publisher"];
    $Genre=$_POST["Genre"];
    $Price=$_POST["Price"];

    //   ทำการเพิ่มข้อมมูล
    try {
        $sql = "INSERT INTO book (Name,Publisher,Genre,Price)
        VALUES ('$name', '$Publisher', '$Genre','$Price')";
        // use exec() because no results are returned
        $conn2->exec($sql);
        echo "<div class='alert alert-success'>
        <strong>บันทึกสำเร็จ!</strong> คุณได้บันทึกข้อมูลเข้าใหม่ 1 รายการ.
        </div>";
      } catch(PDOException $e) {
        echo $sql . "บันทึกข้อมูลผิดพลาด<br>" . $e->getMessage();
      }
      
      $conn2 = null;
}
?>
</body>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>