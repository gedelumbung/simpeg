

<section id="data-keluarga">
  <div class="well">
  	<?php echo $this->session->flashdata('pass'); ?>
    <?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	<div class="tabbable tabs-left">
	<?php
		if($this->session->userdata("tab_a")=="" && $this->session->userdata("tab_b")=="")
		{
			$set['tab_a'] = "active";
			$this->session->set_userdata($set);
		}
		$a = $this->session->userdata("tab_a");
		$b = $this->session->userdata("tab_b");
	?>
	  <ul class="nav nav-tabs">
		<li class="<?php echo $a; ?>"><a href="#lA" data-toggle="tab">Pengaturan Password</a></li>
		<li class="<?php echo $b; ?>"><a href="#lB" data-toggle="tab">Pengaturan Nama Pengguna</a></li>
		<li><a href="<?php echo base_url(); ?>app/logout">Log Out</a></li>
	  </ul>
	  <div class="tab-content">
		<div class="tab-pane <?php echo $a; ?>" id="lA">
		  <h4>Pengaturan Password</h4>
			<?php echo form_open('app/save_pass'); ?>
				<div class="control-group">
					<label class="control-label" for="pass_lama">Username</label>
					<div class="controls">
					  <input type="text" value="<?php echo $this->session->userdata('username'); ?>" 
					  class="span4" name="username" id="username" placeholder="Username" readonly="true">
					</div>
					<label class="control-label" for="pass_lama">Password Lama</label>
					<div class="controls">
					  <input type="password" class="span4" name="pass_lama" id="pass_lama" placeholder="Password Lama">
					</div>
					<label class="control-label" for="pass_lama">Password Baru</label>
					<div class="controls">
					  <input type="password" class="span4" name="pass_baru" id="pass_baru" placeholder="Password Baru">
					</div>
					<label class="control-label" for="pass_lama">Ulangi Password Baru</label>
					<div class="controls">
					  <input type="password" class="span4" name="ulangi_pass_baru" id="ulangi_pass_baru" placeholder="Ulangi Password Baru">
					</div>
			  	</div>
				<div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
			<?php echo form_close(); ?>
		</div>
		<div class="tab-pane <?php echo $b; ?>" id="lB">
		  <h4>Pengaturan Nama Pengguna</h4>
			  <?php echo form_open('app/save_name'); ?>
					<div class="control-group">
						<label class="control-label" for="pass_lama">Nama Pengguna</label>
						<div class="controls">
						  <input type="text" value="<?php echo $this->session->userdata('nama'); ?>" 
						  class="span4" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Pengguna">
						</div>
					</div>
					<div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn btn-primary">Simpan Data</button>
				  <button type="reset" class="btn">Hapus Data</button>
				</div>
			  </div>
			<?php echo form_close(); ?>
		</div>
	  </div>
	</div> <!-- /tabbable -->
  </div>
</section>


      <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
