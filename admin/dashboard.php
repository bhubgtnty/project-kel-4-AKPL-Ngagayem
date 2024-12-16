<?php 

include '../config/koneksi.php';

                        //Sql Query 
                        $sql = "SELECT * FROM kategori";
                        //Execute Query
                        $res = mysqli_query($koneksi, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">
                    <?php 
                        //Sql Query  
                        $sql2 = "SELECT * FROM produk";
                        //Execute Query
                        $res2 = mysqli_query($koneksi, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM pembelian";
                        //Execute Query
                        $res3 = mysqli_query($koneksi, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

