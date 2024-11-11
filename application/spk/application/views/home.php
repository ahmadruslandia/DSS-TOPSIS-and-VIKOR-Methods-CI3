<div class="panel panel-default">
	<div class="panel-heading">
		<form class="form-inline">
			<div class="form-group">
				<input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?= $this->input->get('search') ?>" />
			</div>
			<div class="form-group">
				<button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
			</div>
			<div class="form-group <?= ($this->session->userdata('level') == 'admin') ? '' : 'hidden' ?>">
				<a class="btn btn-default" target="_blank" href="<?= site_url('hitung/hasil_cetak?search=' . $this->input->get('search')) ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
			</div>
		</form>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Alternatif</th>
					<th>Keterangan</th>
					<th>Total TOPSIS</th>
					<th>Total VIKOR</th>
					<th>Rank TOPSIS</th>
					<th>Rank VIKOR</th>
				</tr>
			</thead>
			<?php
			$no = 0;
			foreach ($rows as $row) : ?>
				<tr>
					<td><?= ++$no ?></td>
					<td><?= $row->kode_alternatif ?></td>
					<td><?= $row->nama_alternatif ?></td>
					<td><?= $row->keterangan ?></td>
					<td><?= round($row->total_topsis, 4) ?></td>
					<td><?= round($row->total_vikor, 4) ?></td>
					<td><?= $row->rank_topsis ?></td>
					<td><?= $row->rank_vikor ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>