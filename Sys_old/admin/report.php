<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<form action="manage-users.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
            <center>
                <h1>รายงานยอดผู้เข้ารับการตรวจ</h1>
                

            </center>
            <div class="row mt-6 mb-6">
                <table border="0px">
                <tr>
                    <td>
                    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">วันที่ 11/1/2565</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">124 <small class="text-muted">/ คน</small></h1>

        <button type="button" class="btn btn-lg btn-block btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
      </div>
    </div>
                    </td>
                    <td>
                    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">วันที่ 25/1/2565</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">313 <small class="text-muted">/ คน</small></h1>

        <button type="button" class="btn btn-lg btn-block btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
      </div>
    </div>
                    </td>
                    <td>
                    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">วันที่ 12/2/2565</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">214 <small class="text-muted">/ คน</small></h1>

        <button type="button" class="btn btn-lg btn-block btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
      </div>
    </div>
                    </td>
                </tr>

                </table>
                
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <center>
                        <br>
                        <a href="manage-users.php" class="btn btn-info" role="button">กลับหน้าแอดมิน</a>
                        <button class="btn btn-success" onClick="window.print()">ปริ้นรายงานหน้านี้</button>
                      </center>
                    
                </div>
            </div>
            <div class="row mt-3 mb-3">

            </div>
            
        </div>
    </form>
</body>
</html>