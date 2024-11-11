<div class="row">
    <div class="col-md-6">
        <?= print_error() ?>
        <form method="post">
            <?php foreach ($rows as $row) : ?>
                <div class="form-group">
                    <label><?= $row->nama_kriteria ?> <span class="text-danger">*</span></label>
                    <select class="form-control" name="kode_crips[<?= $row->ID ?>]">
                        <option value="">&nbsp;</option>
                        <?= get_crips_option($row->kode_kriteria, set_value("kode_crips[$row->ID]", $row->kode_crips)) ?>
                    </select>
                </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?= site_url('relasi') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>