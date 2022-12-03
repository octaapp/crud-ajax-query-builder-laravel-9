<?php

namespace App\Http\Controllers;

use App\Models\M_mahasiswa;
use Illuminate\Http\Request;

class C_mahasiswa extends Controller
{
    public function __construct() {
        $this->dt_devnt = new M_mahasiswa();
    }

    public function index()
    {
        return view('_mahasiswa.V_mahasiswa');
    }

    public function list_data()
    {
        $list = $this->dt_devnt->get_AllData();
        $list_array = array();
        $no = 0;
        foreach($list as $dt_row){
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $dt_row->nim;
            $row[] = "$dt_row->nm_depan"." $dt_row->nm_belakang";
            $row[] = $dt_row->jns_kelamin;
            $row[] = $dt_row->agama;
            $row[] = "$dt_row->tmp_lahir".", $dt_row->tgl_lahir";
            $row[] = $dt_row->alamat_rumah;
            $row[] = '<a class="btn-table btn btn-info fa fa-edit" href="#" title="Edit Data" onclick="edit_data('.$dt_row->id_mahasiswa.')"></a> <a class="btn-table btn btn-danger fa fa-trash" href="#" title="Hapus/Delete Data" onclick="delete_data('.$dt_row->id_mahasiswa.')"></a>';
            $list_array[] = $row;
        }
        $output_response = array("recordsFiltered" => $this->dt_devnt->countFiltered(), "data" => $list_array,);
        echo json_encode($output_response);
    }

    public function get_EditData($id){
        $row = $this->dt_devnt->get_DataEdit($id);
        $result_response['Response'] = TRUE;
        $result_response['IdKey'] = $row->id_mahasiswa;
        $result_response['NoIndukMahasiswa'] = $row->nim;
        $result_response['NamaDepan'] = $row->nm_depan;
        $result_response['NamaBelakang'] = $row->nm_belakang;
        $result_response['JenisKelamin'] = $row->jns_kelamin;
        $result_response['Agama'] = $row->agama;
        $result_response['TempatLahir'] = $row->tmp_lahir;
        $result_response['TanggalLahir'] = $row->tgl_lahir;
        $result_response['AlamatRumah'] = $row->alamat_rumah;
        echo json_encode($result_response);
    }

    public function store_ByArray(Request $request)
    {
        $this->_validate($request);
        $insert_array = array(
            'nim'=>$request->input('no-induk-mhs'),
            'nm_depan'=>$request->input('nm-depan'),
            'nm_belakang'=>$request->input('nm-belakang'),
            'jns_kelamin'=>$request->input('jns-kelamin'),
            'agama'=>$request->input('nm-agama'),
            'tmp_lahir'=>$request->input('tmp-lahir'),
            'tgl_lahir'=>$request->input('tgl-lahir'),
            'alamat_rumah'=>$request->input('alamat-rumah'),
            'created_at'=>date('Y-m-d H:i:s')
        );
        $save_result = $this->dt_devnt->saveByArray($insert_array);
        if($save_result == true){
            $saveted_response['Response'] = TRUE;
            $saveted_response['msg_title']="Success";
            $saveted_response['msg_text']="Penambahan Data Baru BERHASIL";
            $saveted_response['msg_type']="success";
            echo json_encode($saveted_response);
        }else{
            $saveted_response['Response'] = FALSE;
            $saveted_response['msg_title']="Error";
            $saveted_response['msg_text']="Penambahan Data Baru GAGAL";
            $saveted_response['msg_type']="error";
            echo json_encode($saveted_response);
        }
    }

    public function update_ByArray(Request $request)
    {
        $this->_validate($request);
        $update_array = array(
            'nim'=>$request->input('no-induk-mhs'),
            'nm_depan'=>$request->input('nm-depan'),
            'nm_belakang'=>$request->input('nm-belakang'),
            'jns_kelamin'=>$request->input('jns-kelamin'),
            'agama'=>$request->input('nm-agama'),
            'tmp_lahir'=>$request->input('tmp-lahir'),
            'tgl_lahir'=>$request->input('tgl-lahir'),
            'alamat_rumah'=>$request->input('alamat-rumah'),
            'updated_at'=>date('Y-m-d H:i:s')
        );
        $update_result = $this->dt_devnt->updateByArray(array('id_mahasiswa'=>$request->input('id-key')), $update_array);
        if($update_result == true){
            $updated_response['Response'] = TRUE;
			$updated_response['msg_title']="Success";
			$updated_response['msg_text']="Update Data BERHASIL";
			$updated_response['msg_type']="success";
			echo json_encode($updated_response);
        }else{
            $updated_response['Response'] = FALSE;
			$updated_response['msg_title']="Error";
			$updated_response['msg_text']="Update Data GAGAL";
			$updated_response['msg_type']="error";
			echo json_encode($updated_response);
        }
    }

    public function get_DeleteData($id){
        $result_get = $this->dt_devnt->get_DataDelete($id);
        $result_response['Response'] = TRUE;
		$result_response['TitleDelete'] = "Apakah Mahasiswa Atas Nama "."$result_get->nm_depan $result_get->nm_belakang"." NIM "."$result_get->nim"." Mau Di HAPUS";
		echo json_encode($result_response);
    }

    public function destroy($id)
    {
        $result_delete = $this->dt_devnt->deleteById($id);
        if($result_delete == true){
            $deleted_response['Response'] = TRUE;
            $deleted_response['msg_title'] = "Success";
            $deleted_response['msg_text'] = "Data Berhasil Di Hapus";
            $deleted_response['msg_type'] = "success";
            echo json_encode($deleted_response);
        }else{
            $deleted_response['Response'] = FALSE;
            $deleted_response['msg_title'] = "Error";
            $deleted_response['msg_text'] = "Data Gagal Di Hapus";
            $deleted_response['msg_type'] = "error";
            echo json_encode($deleted_response);
        }
    }

    private function _validate($request){
        $validated_response = array();
		$validated_response['error_string'] = array();
		$validated_response['inputerror'] = array();
		$validated_response['Response'] = TRUE;

        if($request->input('no-induk-mhs') == ''){
			$validated_response['inputerror'][] = 'no-induk-mhs';
			$validated_response['error_string'][] = 'tidak boleh kosong';
			$validated_response['Response'] = FALSE;
		}

        if($request->input('nm-depan') == ''){
			$validated_response['inputerror'][] = 'nm-depan';
			$validated_response['error_string'][] = 'tidak boleh kosong';
			$validated_response['Response'] = FALSE;
		}

        if($validated_response['Response'] === FALSE){
			$validated_response['msg_title']="Warning";
			$validated_response['msg_text']="Inputan Bersimbol Bintang (*) Tidak Boleh Kosong";
			$validated_response['msg_type']="warning";
			echo json_encode($validated_response);
			exit();
		}
    }
}
