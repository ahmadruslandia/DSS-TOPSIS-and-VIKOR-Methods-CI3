<div class="panel panel-primary">
    <div class="panel-heading">Hasil Analisa</div>
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
            <?php foreach ($rel_alternatif as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $alternatif[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= (isset($crips[$v]->nama_crips)) ? $crips[$v]->nama_crips : "-" ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Data Nilai</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($rel_nilai as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</div>

<div class="panel panel-primary">
    <div class="panel-heading"><strong>Normalisasi</strong></div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <thead>
                    <th>#</th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                </thead>
            </tr>
            <?php foreach ($topsis->normal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Normal Terbobot</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tr>
                <td>Bobot</td>
                <?php foreach ($kriteria as $k => $v) : ?>
                    <td><?= $v->bobot ?></td>
                <?php endforeach ?>
            </tr>
            <?php foreach ($topsis->terbobot as $key => $val) : ?>
                <tr>
                    <td><?= $alternatif[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 5) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Matrik Solusi Ideal</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <?php foreach ($kriteria as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($topsis->solusi_ideal as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 5) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Jarak Solusi &amp; Nilai Preferensi</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Positif</th>
                    <th>Negatif</th>
                    <th>Preferensi</th>
                </tr>
            </thead>
            <?php foreach ($topsis->jarak_solusi as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= round($val['positif'], 5) ?></td>
                    <td><?= round($val['negatif'], 5) ?></td>
                    <td><?= round($topsis->pref[$key], 5) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Perangkingan</div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php foreach ($topsis->rank as $key => $val) :
                query("UPDATE tb_alternatif SET total_topsis='{$topsis->pref[$key]}', rank_topsis='$val' WHERE kode_alternatif='$key'");
            ?>
                <tr>
                    <td><?= $val ?> </td>
                    <td><?= $key ?></td>
                    <td><?= $rows['alternatif'][$key]->nama_alternatif ?></td>
                    <td><?= round($topsis->pref[$key], 4) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="panel-footer">
        <a class="btn btn-default" href="<?= site_url('hitung/topsis_cetak') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div>
</div>