<div class="panel panel-primary">
    <div class="panel-heading">Alternatif Kriteria</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($vikor->data as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $alternatif[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : $minmax[$k][$key] = $v ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right">Max</td>
                    <?php foreach ($vikor->minmax as $key => $val) : ?>
                        <td><?= round($val['max'], 3) ?></td>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <td colspan="2" class="text-right">Min</td>
                    <?php foreach ($vikor->minmax as $key => $val) : ?>
                        <td><?= round($val['min'], 3) ?></td>
                    <?php endforeach ?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Normalisasi Matriks</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($vikor->normal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Nilai Utilitas (S) dan Ukuran Regret (R)</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td>Bobot</td>
                    <?php foreach ($vikor->bobot as $key => $val) : ?>
                        <td><?= round($val, 4) ?></td>
                    <?php endforeach ?>
                    <td>S</td>
                    <td>R</td>
                </tr>
            </thead>
            <?php foreach ($vikor->terbobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach ?>
                    <td><?= round($vikor->total_s[$key], 3) ?></td>
                    <td><?= round($vikor->total_r[$key], 3) ?></td>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="<?= count($kriteria) + 1 ?>">S*</td>
                    <td><?= round($vikor->nilai_s['max'], 3) ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="<?= count($kriteria) + 1 ?>">S-</td>
                    <td><?= round($vikor->nilai_s['min'], 3) ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="<?= count($kriteria) + 1 ?>">R*</td>
                    <td>&nbsp;</td>
                    <td><?= round($vikor->nilai_r['max'], 3) ?></td>
                </tr>
                <tr>
                    <td class="text-right" colspan="<?= count($kriteria) + 1 ?>">R-</td>
                    <td>&nbsp;</td>
                    <td><?= round($vikor->nilai_r['min'], 3) ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Perangkingan </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Nilai v</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <?php foreach ($vikor->rank as $key => $val) :
                query("UPDATE tb_alternatif SET total_vikor='{$vikor->nilai_v[$key]}', rank_vikor='$val' WHERE kode_alternatif='$key'");
            ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $alternatif[$key]->nama_alternatif ?></td>
                    <td><?= round($vikor->nilai_v[$key], 3) ?></td>
                    <td><?= round($vikor->rank[$key], 3) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="panel-footer">
        <a class="btn btn-default" href="<?= site_url('hitung/vikor_cetak') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div>
</div>