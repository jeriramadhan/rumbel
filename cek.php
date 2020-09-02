<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cek Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--
  //ofline file bootstrap dan javascript
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
-->

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

  <?php
  include 'conn.php';
  ?>

  <div class="col-sm-6" style="padding-top: 20px; padding-bottom: 20px;">
    <h3>Cek Hasil Feedback</h3>
    <hr>

      <table class="table table-stripped table-hover datatab">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Saran</th>
            <th>Action</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT * FROM tb_feedback");
          $no = 1;
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['saran']; ?></td>
              <td>
                <!-- Button untuk modal -->
                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">Edit</a>
                <a href="#" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal2<?php echo $data['id']; ?>">Hapus</a>
              </td>
            </tr>
            <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="edit.php" method="get">

                        <?php
                        $id = $data['id']; 
                        $query_view = mysqli_query($koneksi, "SELECT * FROM tb_feedback WHERE id='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_view)) {  
                        ?>

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Saran</label>
                          <input type="text" name="saran" class="form-control" value="<?php echo $row['saran']; ?>">      
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Ubah</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                        <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="modal fade" id="myModal2<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Hapus</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="hapus.php" method="get">

                        <?php
                        $id = $data['id'];
                        $query_view = mysqli_query($koneksi, "SELECT * FROM tb_feedback WHERE id='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($query_view)) {  
                        ?> 
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <p>Anda Yakin Ingin Menghapus?</p>
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>

                        <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
                <?php 
                        }
                        //mysql_close($host);
                        ?>  
              </div>
            </div>
        </tbody>
      </table>          
  </div>

</body>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
</html>