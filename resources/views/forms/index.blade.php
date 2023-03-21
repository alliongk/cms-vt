@extends('layouts.app_back')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-xl-stretch">
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="">
                        <h1 class="text-black-900 fw-semibold" >Daftar Virtual Tour</h1>
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <a href="{{ route('home.forms.create') }}" class="btn btn-sm btn-primary">TAMBAH FORM</a>
                </div>
                <!--end::Card toolbar-->
            </div>
            <div class="card-body pt-2">
                <div class="flex-stack">
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed table-responsive fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>Nama VT</th>
                                <th>Excerpt</th>
                                <th>Deskripsi Singkat</th>
                                <th>Status</th>
                                <th>Type VT</th>
                                <th>Link VT</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var KTDatatablesContent = {
            // forms
            init_forms: function() {
                $("#kt_datatable_example_1").DataTable({ 
                    responsive: !0,
                    searchDelay: 500,
                    processing: !0,
                    serverSide: !0,
                    ajax: {
                        url:"{{ route('home.forms.data') }}",
                    },
                    columns: [
                        { data: 'nama_vt' },
                        { data: 'excerpt' },
                        { data: 'description' },
                        { data: 'status' },
                        { data: 'type.type' },
                        { data: 'path_qr' },
                        { data: 'id' },
                    ],
                    columnDefs: [
                        {
                            targets: -2,
                            orderable: false,
                            render: function(t, type, row) {
                                return (
                                    `<img src="`+base_url+`/storage/`+t+`" alt="image" style="max-width: 110px;">`
                                );
                            }
                        },
                        {
                            targets: -4,
                            width: "75px",
                            data: null,
                            orderable: false,
                            render: function(t, type, row) {
                                var s = {
                                    1: {
                                        title: "Published",
                                        class: " badge badge-light-success"
                                        
                                    },
                                    0: {
                                        title: "Draft",
                                        class: " badge badge-light-danger"
                                    },
                                };
                                
                                return (
                                    `<div class="d-flex flex-row align-items-center">
                                        ${void 0 === s[t] ? t : '<span class="' + s[t].class + '">' + s[t].title + "</span>"}
                                    </div>
                                `
                                );
                            }
                        },
                        {
                            targets: -1,
                            width: "75px",
                            data: null,
                            orderable: false,
                            render: function (data, type, row) {
                                return `<div class="d-flex flex-row align-items-center">
                                        <a href="${base_url}/forms/edit/${data}">
                                            <button id="button_edit_category" class="btn p-1">
                                                <i class="las la-edit fs-2"></i>
                                            </button>
                                        </a>
                                        <button class="btn p-1" data-id="' . $data->id . '">
                                            <i class="las la-trash-alt text-danger fs-2" onclick="change_status_delete_pages(`+data+`)"></i>
                                        </button>
                                    </div>
                                `;
                                
                            },
                        },

                    ]
                })
            }
        };

        jQuery(document).ready((function() {
            KTDatatablesContent.init_forms();
        }));

        function change_status_delete_pages(idVT)
        {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "VT Akan Dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                showLoaderOnConfirm: true,
                    
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: base_url+'/forms/delete/'+idVT,
                            type: 'POST',
                            data : {'_method' : 'POST', '_token' :csrf_token},
                            dataType: 'json'
                        }).done(function(response){
                            swal.fire({
                                title: "Sukses",
                                text: "VT berhasil di hapus!",
                                timer: 1500,
                                showConfirmButton: false,
                                icon: 'success'
                            }).then(function(){ 
                                    $('#kt_datatable_example_1').DataTable().ajax.reload();
                                }
                            );
                        }).fail(function(){
                                swal.fire('Oops...', 'Ada yang salah, silakan coba lagi!', 'error')
                            });
                    });
                },allowOutsideClick: false			  
            });	
        }
    </script>
@endsection
