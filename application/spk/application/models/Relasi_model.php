<?php
class Relasi_model extends CI_Model
{
    public function getRelNilai($rel_alternatif, $crips)
    {
        $arr = array();
        foreach ($rel_alternatif as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] =  (isset($crips[$v]->nilai)) ? $crips[$v]->nilai : 0;
            }
        }
        return $arr;
    }
    public function getArray()
    {
        $rows = get_resuslts("SELECT * FROM tb_rel_alternatif ORDER BY kode_alternatif, kode_kriteria");
        $arr = array();
        foreach ($rows as $row) {
            $arr[$row->kode_alternatif][$row->kode_kriteria] = $row->kode_crips;
        }
        return $arr;
    }

    public function tampil($search = '')
    {
        $query = $this->db->query("SELECT r.*, a.nama_alternatif, c.nama_crips
        FROM tb_rel_alternatif r
            INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria
            INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif
            LEFT JOIN tb_crips c ON c.kode_crips = r.kode_crips
        WHERE (a.kode_alternatif LIKE '%" . $search . "%' OR a.nama_alternatif LIKE '%" . $search . "%')
        ORDER BY r.kode_alternatif, r.kode_kriteria");

        return $query->result();
    }

    public function get_relasi($ID)
    {
        $query = $this->db->query("SELECT
            r.*, a.nama_alternatif, k.nama_kriteria
        FROM tb_rel_alternatif r 
        	INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria
            INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif
            LEFT JOIN tb_crips c ON c.kode_crips = r.kode_crips
        WHERE a.kode_alternatif='$ID' 
        ORDER BY r.kode_kriteria");

        return $query->result();
    }

    public function ubah($kode_crips)
    {
        foreach ($kode_crips as $key => $val) {
            $this->db->update('tb_rel_alternatif', array('kode_crips' => $val), array('ID' => $key));
        }
    }
}
