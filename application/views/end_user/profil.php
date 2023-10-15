			<?php if (empty($nama)) : ?>

				<section class="container marketing">
					<p class="display-5 mb-4">Profil</p>
					<div class="row featurette mb-5">
						<div class="col-md-7">
							<h2 class="featurette-heading"><?php echo $nama ?></h2>
							<p class="lead">Anggota tidak ditemukan.</p>
						</div>
					</div>
				</section>
			<?php return;
			endif ?>
			<!-- Marketing messaging and featurettes
		  ================================================== -->
			<!-- Wrap the rest of the page in another container to center all the content. -->

			<section id="ormawa" style="padding-bottom:8rem">
				<div class="container detail-anggota">
					<h1 class="headline-event text-center">Profil</h1>
					<div class="row">

						<div class="col-md-5">
							<div class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto overflow-hidden img-cstm" style="
		      			width: 300px;
		      			height: auto; 
								border-radius: 10px;
		      			background: url('<?php echo (!empty($image)) ? base_url() . 'assets/img/members/' . $image : base_url() . 'assets/img/members/no_photo.png'; ?> ?>');
		      			background-size: cover;
		      			background-repeat: no-repeat;
		      			background-position: center;
		      	">
								<img src="<?php echo (!empty($image)) ? base_url() . 'assets/img/members/' . $image : base_url() . 'assets/img/members/no_photo.png'; ?> ?>" style="opacity: 0; width: 100%; height: 100%;">
							</div>
						</div>

						<div class="col-md-7 mt-4 head-desk">
							<h3 class="prof-head text-center"><?php echo $nama ?></h3>
							<p class="prof-p" style="color:white">Jabatan: <?php if (!empty($id_jabatan)) {
															echo $this->Model_jabatan->id_to_jabatan($id_jabatan);
														} else {
															echo 'Tidak menjabat / nonaktif';
														} ?></p>
							<?php $kontak = explode(",", $kontak); ?>
							<?php foreach ($kontak as $key => $k) : ?>
								<p class="prof-p" style="color:white"><?php echo $k ?></p>
							<?php endforeach ?>
							<p class="prof-p" style="color:white">Kelas: <?php echo $kelas ?></p>
							<p class="prof-p" style="color:white"><?php echo $deskripsi ?></p>
						</div>

					</div>
				</div>
			</section>