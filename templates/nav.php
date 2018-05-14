<header class="main">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="/index.php" class="navbar-brand" id="logo">SU</a>
      </div>
    </div>
  </nav>

  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <?php if($_SESSION["error"]) : ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert">&#215;</a>
          <?php
            echo($_SESSION["error"]);
            unset($_SESSION["error"]);
          ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</header>
