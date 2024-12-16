  <!-- navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>        
        <li><a href="checkout.php">Checkout</a></li>

        <!-- Jika sudah login (ada login pelanggan) -->
        <?php if(isset($_SESSION["pelanggan"])): ?>
        <li><a href="riwayat.php">Riwayat Belanja</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="logout.php">Logout</a></li>
        <!-- Selain itu (belum login / belum ada session pelanggan) -->
        <?php else: ?>
          <li><a href="daftar.php">Daftar</a></li>          
          <li><a href="login.php">Login</a></li>

        <?php endif; ?>


      </ul>

      <form action="pencarian.php" method="get" class="navbar-form navbar-right">
        <input type="text" class="form-control" name="keyword">
        <button class="btn btn-primary">Cari</button>
      </form>
    </div>
  </nav>