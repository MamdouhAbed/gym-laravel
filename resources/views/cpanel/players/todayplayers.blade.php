
@extends('cpanel.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables-net/media/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables-net/extensions/colreorder/css/colReorder.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables-net/extensions/row-reorder/css/rowReorder.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/datatables-net/datatables.min.css')}}">
    <script src="{{ asset('libs/jquery/jquery.validate.js')}}"></script>

@stop

@section('content')

    <div class="column page">
        <div class="header">
            <section class="title">
                <h3>المشتركين المسجلين اليوم</h3>

                <div class="controls">
                    <nav class="breadcrumb default">
                        <a class="breadcrumb-item breadcrumb-icon" href="{{url('/')}}">
                            <span class="la la-home icon"></span>
                        </a>
                        <span class="breadcrumb-item active" href="#">المشتركين المسجلين اليوم</span>
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
                                    <th>الحالة</th>
                                    <th class="no_sort">مدفوع</th>
                                    <th class="no_sort">متبقي</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>تاريخ انتهاء التسجيل</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        @include('cpanel.include.editAjax')
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
                "order": [[ 0, "desc" ]],
                "columnDefs": [ {
                    "targets"  : 'no_sort',
                    "orderable": false
                }],

                "scrollY": 300,
                "scrollCollapse": true,
                colReorder: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: SITEURL + "/todayplayers",
                    type: 'GET'
                },
//                createdRow: function(row, data, dataIndex){
//                    $(row).attr('id', 'row-' + dataIndex);
//                    //   $(row).attr('order_id', data.id);
//                },
//                rowReorder: {
//                    dataSrc: 'order_id',
//                    update: false
//                },

                    /* get players ajax */
                columns: [
                    {data: 'id', name: 'id'},
                    { data: 'name', name: 'name', class:'post_item'},
                        @if(Auth::user()->role==1) { data: 'category_name', name: 'category_name' }, @endif
                    { data: 'phone', name: 'phone' },
//                    { data: 'paid_name', name: 'paid_name' },
                    {
                        data: null,
                        render: function (data) {
                            if (data.paid_id==1) {
                                return '<span class="badge badge-mantis">'  +data.paid_name+ '</span>'
                            }
                            else if (data.paid_id==2) {
                                return '<span class="badge badge-crusta">'  +data.paid_name+ '</span> '
                            }
                            else if (data.paid_id==3) {
                                return '<span class="badge badge-cranberry">'  +data.paid_name+ '</span> '
                            }

                        },
                    },
                    { data: null, name: 'paid_value',
                        render: function (data) {
                            return data.paid_value+ ' شيكل '
                        },
                    },
                    { data: null, name: 'paid_remainder',
                        render: function (data) {
                            return data.paid_remainder+ ' شيكل '
                        },
                    },
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
    </script>
    @include('cpanel.include.playersOperation')

@stop
