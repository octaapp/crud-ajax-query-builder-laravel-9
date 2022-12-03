@extends('_adminlayout.V_main')
@section('content_page')

<!-- Page Title -->
<div class="page-title mb-3">
  <div class="row">
    <div class="col-12 col-md-6">
			<nav aria-label="breadcrumb" class='breadcrumb-header float-start'>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
				</ol>
			</nav>
    </div> 
    <div class="col-12 col-md-6 order-md-2 order-first">
      <a class="btn btn-primary tombol-tambah float-end mb-2 me-1" onclick="Add_modal()">+ Tambah Data</a>
    </div>
  </div>
</div>

<div class="container-fluid">
	<div class="row">

			

		<!-- START DATA -->
		<div class="col-md-12 col-12">
			<div class="row">
				<div class="card">
					<div class="card-content">
						<div class="row">
							<div class="card-body">
								<table class="table table-striped" id="myTable">
									<thead>
										<tr>
											<th class="col-md-1">No</th>
											<th>NIM</th>
											<th>Nama Mahasiswa</th>
											<th>Gender</th>
											<th>Agama</th>
											<th>Tempat & Tgl. Lahir</th>
											<th>Alamat</th>
											<th class="action-1"></th>
										</tr>
									</thead>
								</table>	
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
			<!-- AKHIR DATA -->
	</div>
</div>
<!-- End Page Title -->
@include('_mahasiswa.V_save_update_mahasiswa')
<script type="text/javascript">
	var submit_method;
  var table;
	$(document).ready(function() {
		table = $('#myTable').DataTable({
		"searching": false,
		"paging":   true,
		"order": false,
		"ordering": false,
		"info":     true,
		"processing": true,
		"serverside": true,
		"ajax":{
			"url" :"{{ route('datatables-list') }}",
				"type": "POST"
			},
		"lengthMenu": [[5, 10, 25], [5, 10, 25]],
		"columnDefs":[{
			"targets": [ -1 ],
			"orderable": false,
		},],
			});
			submit_method = 'add';
			$("input").change(function(){$(this).parent().parent().removeClass('has-error');$(this).next().empty();});
			$('#form_SaveUpdate')[0].reset();
	});

	function refresh_table(){
		table.ajax.reload(null,false);
	}

	// GLOBAL SETUP
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function Add_modal()
	{
		submit_method = 'add';
		$('#form_SaveUpdate')[0].reset();
		$('#modal_SaveUpdate').modal('show');
    $('.modal-title').text('Add New Mahasiswa');
	}

	function cancel(){
		submit_method = 'add';
		$('#form_SaveUpdate')[0].reset();
		$('#btnSaveUpdate').removeClass('disabled').html('<i class="fa fa-floppy-o"></i> Save ');
	}

  function SaveUpdate(){
    var url_method;
		$('#btnSaveUpdate').addClass('disabled', true).html('<i class="fa fa-spinner fa-pulse"></i> Processing.....');
    if(submit_method == 'add') {
      url_method = "{{ route('save-data-mahasiswa-ajax') }}";
    }else{
      url_method = "{{ route('update-data-mahasiswa-ajax') }}";
    }
		$.ajax({
			url : url_method,
			type: "POST",
      data: $('#form_SaveUpdate').serialize(),
			dataType: "JSON",
      cache: false,
			success: function(data){
				if(data.Response){
        $('#form_SaveUpdate')[0].reset();
				swal(data.msg_title, data.msg_text, data.msg_type);
				refresh_table();
				submit_method = 'add';
				$('#modal_SaveUpdate').modal('hide');
				}else{
					swal(data.msg_title, data.msg_text, data.msg_type);
          for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
					}
        }
				$('#btnSaveUpdate').removeClass('disabled').html('<i class="fa fa-floppy-o"></i> Save ');
			},
			error: function (jqXHR, textStatus, errorThrown){
				$('#btnSaveUpdate').removeClass('disabled').html('<i class="fa fa-floppy-o"></i> Save ');
				swal("Error Message ", "" + jqXHR.statusText , "error");
			}
		});
	}

  function edit_data(id){
		submit_method = 'edit';
		$('#form_SaveUpdate')[0].reset();
		$('#btnSaveUpdate').removeClass('disabled').html('<i class="fa fa-floppy-o"></i> Update ');
		$.ajax({
			url : "{{ route('get-data-mahasiswa-ajax') }}/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
        if(data.Response){
					$('#modal_SaveUpdate').modal('show');
    			$('.modal-title').text('Edit Data Mahasiswa');
          $('[name="id-key"]').val(data.IdKey);
          $('[name="no-induk-mhs"]').val(data.NoIndukMahasiswa);
          $('[name="nm-depan"]').val(data.NamaDepan);
					$('[name="nm-belakang"]').val(data.NamaBelakang);
          $('[name="jns-kelamin"]').val(data.JenisKelamin);
					$('[name="nm-agama"]').val(data.Agama);
          $('[name="tmp-lahir"]').val(data.TempatLahir);
					$('[name="tgl-lahir"]').val(data.TanggalLahir);
          $('[name="alamat-rumah"]').val(data.AlamatRumah);
        }else{
          swal(data.msg_title, data.msg_text, data.msg_type);
        }
      },
			error: function (jqXHR, textStatus, errorThrown){
				swal("Error Message ", "" + jqXHR.statusText , "error");
			}
		});
	}

	function delete_data(id){
		$.ajax({
		url : "{{ route('get-delete-data-mahasiswa-ajax') }}/" + id,
		type: "GET",
		dataType: "JSON",
		success: function(data){
			if(data.Response){
				swal({
					title: "Warning",
					text: data.TitleDelete,
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				},
				function(isConfirm){
					if(!isConfirm)return;
					$.ajax({
						url : "{{ route('delete-data-mahasiswa-ajax') }}/"+id,
						type: "POST",
						dataType: "JSON",
						data  : {"_method": 'DELETE'},
						success:function(data){
							if(data.Response){
								swal(data.msg_title, data.msg_text, data.msg_type);
								refresh_table();
							}else{
								swal(data.msg_title, data.msg_text, data.msg_type);
							}
						},
						error: function (jqXHR, textStatus, thrownError){
							swal("Error Message ", "" + jqXHR.statusText , "error");
							$('#btnSaveUpdate').removeClass('disabled').html('<i class="fa fa-floppy-o"></i> Save ');
						} // End error function
					});
				}); // End swal
			} // end if response
				}, // end success: function(data)
				error: function (jqXHR, textStatus, thrownError) {
					$('#btnSaveUpdate').removeClass('disabled').html('<i class="fa fa-floppy-o"></i> Save ');
					swal("Error Message ", "" + jqXHR.statusText , "error");
				} // End error function
		}); // end ajax
	}
</script>
@endsection