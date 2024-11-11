<h1><?= $title ?></h1>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <thead>
            <th>#</th>
            <?php foreach ($kriteria as $key => $val) : ?>
                <th><?= $val->nama_kriteria ?></th>
            <?php endforeach ?>
        </thead>
    </tr>
    <?php foreach ($rel_alternatif as $key => $val) : ?>
        <tr>
            <td><?= $alternatif[$key]->nama_alternatif ?></td>
            <?php foreach ($val as $k => $v) : ?>
                <td><?= (isset($crips[$v]->nama_crips)) ? $crips[$v]->nama_crips : "-" ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <thead>
            <th>#</th>
            <?php foreach ($kriteria as $key => $val) : ?>
                <th><?= $key ?></th>
            <?php endforeach ?>
        </thead>
    </tr>
    <?php foreach ($rel_nilai as $key => $val) : ?>
        <tr>
            <td><?= $key ?></td>
            <?php foreach ($val as $k => $v) : ?>
                <td><?= $v ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>

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
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>Rank</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Total</th>
    </tr>
    <?php foreach ($topsis->rank as $key => $val) : ?>
        <tr>
            <td><?= $val ?> </td>
            <td><?= $key ?></td>
            <td><?= $alternatif[$key]->nama_alternatif ?></td>
            <td><?= round($topsis->pref[$key], 4) ?></td>
        </tr>
    <?php endforeach ?>
</table>