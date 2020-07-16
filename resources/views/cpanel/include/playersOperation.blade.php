<script>
    var SITEURL = '{{URL::to('')}}';
    /* When click edit players */
    $('#ajax-product-modal').iziModal();
    function update_players(players_id) {
        $.get('players/' + players_id +'/edit', function (data) {
            $('#name-error').hide();
            $('#bondnumber-error').hide();
            $('#btn-save').val("update_players");
            $('#ajax-product-modal').iziModal('open');
            $('#players_id').val(data.id);
            $('#name').val(data.name);
            $('#bondnumber').val(data.bondnumber);
            $('.paid_id'+data.paid_id).attr('checked',"checked");

            if (data.paid_id==1) {
                $('#paid_value1').val(data.paid_value);
                $('#part').hide();
                $('#complete').show();
                $('#complete').css('display','inline-block');
                $('#paid_value2').val('');
                $('#paid_remainder').val('');
                document.getElementById('paid_id1').checked = true;
                document.getElementById('paid_id2').checked = false;
                document.getElementById('paid_id3').checked = false;
            }
             if (data.paid_id==2) {
                $('#paid_value2').val(data.paid_value);
                $('#paid_remainder').val(data.paid_remainder);
                 $('#complete').hide();
                 $('#part').show();
                 $('#part').css('display','inline-block');
                 $('#paid_value1').val('');
                 document.getElementById('paid_id1').checked = false;
                 document.getElementById('paid_id2').checked = true;
                 document.getElementById('paid_id3').checked = false;
             }
            if (data.paid_id==3) {
                $('#complete').hide();
                $('#part').hide();
                $('#paid_value1').val('');
                $('#paid_value2').val('');
                $('#paid_remainder').val('');
                document.getElementById('paid_id1').checked = false;
                document.getElementById('paid_id2').checked = false;
                document.getElementById('paid_id3').checked = true;
            }
            $('#reg_date').val(data.reg_date);
            $('#reg_end_date').val(data.reg_end_date);
        })
    }

    if ($("#productForm").length > 0) {
        $("#productForm").validate({
            submitHandler: function(form) {

                var actionType = $('#btn-save').val();
                $('#btn-save').html('جاري الحفظ..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: SITEURL + "/players/store",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#productForm').trigger("reset");
                        $('#ajax-product-modal').iziModal('close');
                        $('#btn-save').html('حفظ التغييرات');
                        swal({
                            title: "تم تعديل بيانات المشترك بنجاح!",
                            type: "success",
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: "تم "
                        });
                        var oTable = $('#datatable').dataTable();
                        oTable.fnDraw(false);

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#btn-save').html('حفظ التغييرات');
                        swal({
                            title: "خطأ!",
                            text: "لم يتم تعديل بيانات المشترك!",
                            type: "error",
                            confirmButtonClass: 'btn-danger',
                            confirmButtonText: "موافق "
                        });
                    }
                });
            }
        })
    }
    /* When click delete players */
    function delete_players(players_id) {

        swal({
                    title: "هل أنت متأكد؟",
                    text: "سيتم حذف المشترك وإرساله إلى سلة المهملات!",
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
                        url: SITEURL + "/players/delete/" + players_id,
                        success: function (data) {
                            swal({
                                title: "تم حذف المشترك بنجاح!",
                                text: "تم إرسال المشترك إلى سلة المهملات!",
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

    /* When click stop publish players */
    function stop_publish(players_id) {

        swal({
                    title: "هل أنت متأكد؟",
                    text: "سيتم تعطيل حالة المشترك وإرساله إلى قائمة الغير فعالين!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-warning',
                    confirmButtonText: '!نعم، قم بالتعطيل',
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    cancelButtonText: "ليس الآن"
                },
                function() {
                    $.ajax({
                        type: "get",
                        url: SITEURL + "/players/stopPublish/" + players_id,
                        success: function (data) {
                            swal({
                                title: "تم التعطيل بنجاح!",
                                text: "تم إرسال المشترك إلى قائمة الغير فعالين!",
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
                                text: "لم يتم تعطيل حالة المشترك!",
                                type: "error",
                                confirmButtonClass: 'btn-danger',
                                confirmButtonText: "موافق "
                            });
                        }
                    });
                });
    }
    /* When click stop publish players */
    function republish(players_id) {

        swal({
                    title: "هل أنت متأكد؟",
                    text: "سيتم تفعيل حالة المشترك وإرساله إلى أرشيف المشتركين!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-warning',
                    confirmButtonText: '!نعم، فعّل',
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    cancelButtonText: "ليس الآن"
                },
                function() {
                    $.ajax({
                        type: "get",
                        url: SITEURL + "/players/rePublish/" + players_id,
                        success: function (data) {
                            swal({
                                title: "تم النشر بنجاح!",
                                text: "تم تفعيل حالة المشترك وإرساله إلى أرشيف المشتركين!",
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
                                text: "لم يتم تفعيل حالة المشترك!",
                                type: "error",
                                confirmButtonClass: 'btn-danger',
                                confirmButtonText: "موافق "
                            });
                        }
                    });
                });
    }
</script>
