
@extends('cpanel.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables-net/media/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables-net/extensions/colreorder/css/colReorder.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables-net/extensions/row-reorder/css/rowReorder.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/datatables-net/datatables.min.css')}}">
    {{--<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">--}}
@stop

@section('content')

    <div class="column page">
        <div class="header">
            <section class="title">
                <h3>المشتركين المحذوفين</h3>

                <div class="controls">
                    <nav class="breadcrumb default">
                        <a class="breadcrumb-item breadcrumb-icon" href="{{url('/')}}">
                            <span class="la la-home icon"></span>
                        </a>
                        <span class="breadcrumb-item active" href="#">المشتركين المحذوفين</span>
                    </nav>

                    <button class="btn btn-primary-outline light content-nav-toggle" data-block-toggle=".content-nav > .nav">Menu</button>
                </div>
            </section>
        </div>

        <div class="content">
            <div class="body content-nav">
                <div class="nav-body">
                    <div class="nav-body-wrapper">
                        <div class="container-fluid">
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th class="no_sort">اسم المشترك</th>
                                    @if(Auth::user()->role==1)<th>الجنس</th>@endif
                                    <th class="no_sort">جوال</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>تاريخ انتهاء التسجيل</th>
                                </tr>
                                </thead>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('libs/datatables-net/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('libs/datatables-net/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('libs/datatables-net/extensions/colreorder/js/dataTables.colReorder.min.js')}}"></script>
    <script src="{{ asset('libs/datatables-net/extensions/row-reorder/js/dataTables.rowReorder.min.js')}}"></script>
    {{--<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>--}}

    <script type="application/javascript">
        var SITEURL = '{{URL::to('')}}';

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#datatable');
            var datatable = table.DataTable({
                "initComplete": function () {
                    $('.dataTables_length select', '#datatable_wrapper').select2({
                        minimumResultsForSearch: Infinity
                    });
                    $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane();
                },
                "language": {
                    "sProcessing":   "جارٍ التحميل...",
                    "sLengthMenu":   "أظهر _MENU_ مدخلات",
                    "sZeroRecords":  "لم يعثر على أية سجلات",
                    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix":  "",
                    "sSearch":       "ابحث:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                },
                "rowReorder": false,
                "columnDefs": [ {
                "targets"  : 'no_sort',
                "orderable": false
                }],
                "order": [[ 0, "desc" ]],
                "scrollY": 300,
                "scrollCollapse": true,
                colReorder: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: SITEURL + "/deletedplayers",
                    type: 'GET'
                },
                /* get players ajax */
                columns: [

                    {data: 'id', name: 'id'},
                    { data: 'name', name: 'name', class:'post_item'},
                        @if(Auth::user()->role==1) { data: 'category_name', name: 'category_name' }, @endif
                    { data: 'phone', name: 'phone' },
//                    { data: 'paid_name', name: 'paid_name' },

                    { data: 'reg_date', name: 'reg_date' },
                    { data: 'reg_end_date', name: 'reg_end_date' },
//                    { data: 'user_name', name: 'user_name' },
                ],

            });
            table.on('draw.dt', function () {
                $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane().data().jsp.destroy();
                $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane();
            });
        });


            /* When click recover players */
            function recovery_players(players_id) {

                swal({
                            title: "هل أنت متأكد؟",
                            text: "سيتم استرجاع المشترك وإرساله إلى قائمة المشتركين!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: 'btn-warning',
                            confirmButtonText: '!نعم، استرجع',
                            closeOnConfirm: false,
                            closeOnCancel: true,
                            cancelButtonText: "ليس الآن"
                        },
                        function() {
                            $.ajax({
                                type: "get",
                                url: SITEURL + "/players/recover/" + players_id,
                                success: function (data) {
                                    swal({
                                        title: "تم استرجاع المشترك بنجاح!",
                                        text: "تم إرجاع المشترك إلى قائمة المشتركين!",
                                        type: "success",
                                        confirmButtonClass: 'btn-success',
                                        confirmButtonText: "تم "
                                    });
                                    var oTable = $('#datatable').dataTable();
                                    oTable.fnDraw(false);
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                    swal({
                                        title: "خطأ!",
                                        text: "لم يتم استرجاع المشترك!",
                                        type: "error",
                                        confirmButtonClass: 'btn-danger',
                                        confirmButtonText: "موافق "
                                    });
                                }
                            });
                        });
            }




        /* When click shift delete players */
        function shift_delete(players_id) {

            swal({
                        title: "هل أنت متأكد؟",
                        text: "سيتم حذف المشترك نهائياً ولا يمكن استراجعه!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-warning',
                        confirmButtonText: '!نعم، احذف',
                        closeOnConfirm: false,
                        closeOnCancel: true,
                        cancelButtonText: "ليس الآن"
                    },
                    function() {
                        $.ajax({
                            type: "get",
                            url: SITEURL + "/players/shiftDelete/" + players_id,
                            success: function (data) {
                                swal({
                                    title: "تم حذف المشترك بنجاح!",
                                    text: "تم حذف المشترك ولا يمكن استرجاعه!",
                                    type: "success",
                                    confirmButtonClass: 'btn-success',
                                    confirmButtonText: "تم "
                                });
                                var oTable = $('#datatable').dataTable();
                                oTable.fnDraw(false);
                            },
                            error: function (data) {
                                console.log('Error:', data);
                                swal({
                                    title: "خطأ!",
                                    text: "لم يتم حذف المشترك!",
                                    type: "error",
                                    confirmButtonClass: 'btn-danger',
                                    confirmButtonText: "موافق "
                                });
                            }
                        });
                    });
        }


    </script>


@stop


