<div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Penggajian</b> DKB</a>
      </div><!-- /.login-logo -->
      <div id="message">
            <?php 
              if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "login"){
                echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                echo "</div>";
              }
            ?>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Masuk" name="masuk" />
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->