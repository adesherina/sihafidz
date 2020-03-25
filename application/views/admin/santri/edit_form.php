<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/santri/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $santri->id_santri?>" />

							<div class="form-group">
								<label for="nama_santri">Name Santri</label>
								<input class="form-control <?php echo form_error('nama_santri') ? 'is-invalid':'' ?>"
								 type="text" name="nama_santri" placeholder="" value="<?php echo $santri->nama_santri ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_santri') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="kelas">Kelas</label>
								<input class="form-control <?php echo form_error('kelas') ? 'is-invalid':'' ?>"
								 type="number" name="kelas" min="0" placeholder="" value="<?php echo $santri->kelas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kelas') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
								 type="text" name="tempat_lahir" placeholder="" value="<?php echo $santri->tempat_lahir ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tempat_lahir') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tanggal_lahir">Tanggal Lahir</label>
								<input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>"
								 type="text" name="tanggal_lahir" placeholder="" value="<?php echo $santri->tanggal_lahir ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal_lahir') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<input class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>"
								 type="text" name="jenis_kelamin" placeholder="" value="<?php echo $santri->jenis_kelamin ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jenis_kelamin') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat Santri</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="" value="<?php echo $santri->alamat ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html> 