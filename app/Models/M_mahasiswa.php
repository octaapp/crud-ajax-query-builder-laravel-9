<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_mahasiswa extends Model
{
    use HasFactory;
    public $table = "dt_mahasiswa";
    protected $order = array('id_mahasiswa'=>'desc');

    public function __construct(){
        parent::__construct();
        $this->builder = DB::table($this->table);
    }

    private function _QueryDataTables(){
        $this->builder->select('id_mahasiswa', 'nim', 'nm_depan', 'nm_belakang', 'jns_kelamin', 'agama', 'tmp_lahir', 'tgl_lahir', 'alamat_rumah');
        if(isset($this->order)){
            $order = $this->order;
            $this->builder->orderBy(key($order), $order[key($order)]);
        }
    }

    public function get_AllData(){
        $this->_QueryDataTables();
        return $this->builder->get();
    }

    public function countFiltered()
    {
        $this->_QueryDataTables();
        return $this->builder->count();
    }

    public function saveByArray($insert_array)
    {
        return $this->builder->insert($insert_array);
    }

    public function get_DataEdit($id){
        $this->builder->select('id_mahasiswa', 'nim', 'nm_depan', 'nm_belakang', 'jns_kelamin', 'agama', 'tmp_lahir', 'tgl_lahir', 'alamat_rumah');
        $this->builder->where('id_mahasiswa', $id);
        return $this->builder->first();
    }

    public function updateByArray($where, $dataUpdate){
        $this->builder->where($where);
        return $this->builder->update($dataUpdate);
    }

    public function get_DataDelete($id){
        $this->builder->select('nim', 'nm_depan', 'nm_belakang');
        $this->builder->where('id_mahasiswa', $id);
        return $this->builder->first();
    }

    public function deleteById($id){
        $this->builder->where('id_mahasiswa', $id);
        return $this->builder->delete();
    }
}
