<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model
{
    private $_table = "santri";

    public $id_santri;
    public $nama_santri;
    public $kelas;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $alamat;

    public function rules()
    {
        return [
            ['field' => 'nama_santri',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'kelas',
            'label' => 'kelas',
            'rules' => 'numeric'],
            
            ['field' => 'tempat_lahir',
            'label' => 'tempat',
            'rules' => 'required'],

            ['field' => 'tanggal_lahir',
            'label' => 'tanggal',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'jenis',
            'rules' => 'required'],
            
            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required']

        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_santri" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_santri = uniqid();
        $this->nama_santri = $post["nama_santri"];
        $this->kelas = $post["kelas"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_table, $this);

    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_santri = $post["id"];
        $this->nama_santri = $post["nama_santri"];
        $this->kelas = $post["kelas"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat = $post["alamat"];
        return $this->db->update($this->_table, $this, array('id_santri' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_santri" => $id));
    }
}