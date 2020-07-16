<script type="application/javascript">
    (function ($) {
        $(document).ready(function() {
            $.validate({
                modules : 'location, date, security, file',
                onModulesLoaded : function() {

                }
            });
            $('#maxlength-area').restrictLength($('#maxlength-label'));

        });

    })(jQuery);

    $('select.select-rtl-support').select2({
        dir: 'rtl'
//            templateResult: formatState
    });

    //                (function ($) {
    //                    $('#summernote-editor-default').summernote({
    //                        lang: 'ar-AR',
    //                        height: 200,
    //                        tabsize: 2,
    //                        placeholder: 'اكتب هنا متن المشترك',
    //                        direction: 'rtl'
    //                    });
    //                    $('#summernote-editor-air-mode').summernote({
    //                        airMode: true
    //                    });
    //                })(jQuery);
    $('select.ks-select-tagging-support').select2({
        tags: true,
        dir: 'rtl'
    });
</script>

<script type="application/javascript">
    (function ($) {
        $(document).ready(function() {
            function bytesToSize(bytes) {
                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (bytes == 0) return '0 Byte';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
            }



            // DropZone implementation
            $(".attach-files-widget .upload").on('dragover', function (e) {
                $(this).addClass('dragover');
            }).on('dragleave', function (e) {
                $(this).removeClass('dragover');
            }).on('drop', function (e) {
                $(this).removeClass('dragover');
            });

            $(document).bind('drop dragover', function (e) {
                e.preventDefault();
            });

            // Upload images only
            $('#file-upload-widget-images-input').fileupload({
                dropZone: $('#file-upload-dropzone-images-only'),
                autoUpload: false,
                dataType: 'json',
                singleFileUploads: true,
                acceptFileTypes:  /(jpeg)|(png)|(gif)|(jpg)$/i,
                add: function (e, data) {
                    $('#widget-attachments-images-only .uploading-files-container').show();
                    var jqXHR;

                    $.each(data.files, function (index, file) {
                        var fileUploadInfo = '<div id="file-uploading-' + file.lastModified + '" class="uploading-progress-block"> \
                            <span class="filename">' + file.name + '</span> \
                            <div class="progress progress-inline"> \
                            <div class="progress progress-sm"> \
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0" aria-valuenow="00" aria-valuemin="0" aria-valuemax="100"></div> \
                            </div> \
                            <span class="amount">0%</span> \
                            </div> \
                            <div class="cancel-block"> \
                                <a class="icon la la-close"></a> \
                            </div> \
                    </div>';
                        data.context = $(fileUploadInfo).appendTo($('#widget-attachments-images-only .uploading-files'));

                        $(data.context).find(".cancel-block").click(function() {
                            jqXHR.abort();
                            data.context.remove();
                        })
                    });

                    data.process().done(function () {
                        jqXHR = data.submit();
                    });
                },
                progress: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    var size = data.files[0].size;
                    var uploadedBytes = (size / 100) * progress;
                    var id = 'file-uploading-' + data.files[0].lastModified;

                    $('#' + id).find('.progress-bar').css('width', progress + '%');
                    $('#' + id).find('.amount').text(progress + '%');
                },
                stop: function (e) {
                    $('#widget-attachments-images-only .uploading-files-container').hide();
                },
                done: function (e, data) {
                    $.each(data.files, function (index, file) {
                        var id = 'file-uploading-' + data.files[0].lastModified;
                        $('#' + id).remove();
                    });

                    var uploadedFileInfo = '<li class="file"> \
                        <img class="thumb" src="assets/img/thumbs/ph-1.png"> \
                            <a class="icon la la-trash remove"></a> \
                        </li>';
                    $(uploadedFileInfo).appendTo($('#widget-attachments-images-only .files ul'));

                    new Noty({
                        text: 'الملف ' + data.result.file.name + ' تم رفعه بنجاح!',
                        type   : 'success',
                        theme  : 'mint',
                        layout : 'topRight',
                        timeout: 2000
                    }).show();
                },
                fail: function (e, data) {
                    $.each(data.files, function (index, file) {
                        var id = 'file-uploading-' + data.files[0].lastModified;
                        $('#' + id).addClass('file-uploading-error');
                    });

                    new Noty({
                        text: 'خطأ في الرفع! الرجاء المحاولة مرة أخرى.',
                        type   : 'error',
                        theme  : 'mint',
                        layout : 'topRight',
                        timeout: 2000
                    }).show();
                }
            });

            $(document).on('click', '#widget-attachments-images-only .files .remove', function () {
                var file = $(this).closest('li');

                $.confirm({
                    title: 'تحذير!',
                    content: 'هل أنت متأكد من أنك تريد حذف هذا الملف؟',
                    type: 'danger',
                    buttons: {
                        confirm: {
                            text: 'نعم, حذف',
                            btnClass: 'btn-danger',
                            action: function() {
                                file.remove();
                            }
                        },
                        cancel: {
                            text: 'إلغاء'
                        }
                    }
                });
            });
        });
    })(jQuery);
</script>
<script>
    var index=20;
    var baseURL= "{{asset('')}}";
    var baseURL2= "{{asset('')}}thumb.php?src=";
    var size= "&size=198x95";
    var count=0;
    var count2=0;
    $('#images-archive').iziModal({
        width: 1000
    });
    $('.images-archive').on('click', function (e) {
        $($(this).data('target')).iziModal('open');
        if(count==0) {
            $('#img_location').empty();
            $.ajax({
                url: baseURL + '/getImages',
                method: 'get',
                data :{
                    offset : 0,
                    txt: $('#search-contacts').val()
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#image').show();
                    $('#load_more_btn').hide();
                },
                complete: function(){
                    $('#image').hide();
                },

                success: function (response) {

                    var len = response.length;
                    var i = 0;
                    if(len==0){
                        $('#load_more_btn').hide();
                        $('#error_msg').show();

                    }else {
                        if(len<20){
                            $('#load_more_btn').hide();
                            $('#error_msg').hide();
                        }else{
                            $('#load_more_btn').show();
                            $('#error_msg').hide();
                        }
                        while (len > i) {
                            $('#img_location').append(
                                    '<div class="col-lg-3">' +
                                    '<div class="card border-grey border-lighten-2">' +
                                    '<div class="">' +
                                    '<div class="archive_action">' +
                                    '<button class="img_use btn btn-primary"  link="'+response[i].img+'">إستخدام</button>'+
                                    '</div>' +
                                    '<img   src="' + baseURL2 + response[i].img + size +  '" />' +
                                    '</div>' +
                                    '<p class="img-path">' + response[i].img + '</p>' +
                                    '<div class="text-xs-center" style="height: 22px; padding-top: 3px; overflow: hidden">' +
                                    '<span class="use-img" contenteditable style="font-size: 10px;">' + response[i].name + '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                            );

                            i++;
                        }
                        count++;
                    }


                }
            });

        }
    });
    $("#img_location").on('click','.img_use',function (e) {
        e.preventDefault();
        $('#file_image').removeAttr('data-validation');
        $('#file_image').next().remove();
        $('#im_ar').val($(this).attr('link'));
        $('#image-select').attr('src',"{{asset('')}}"+$(this).attr('link'));
        $('#images-archive').iziModal('close');
    });

    function load_more() {



        $.ajax({
            url: baseURL + '/getImages',
            method: 'get',
            data :{
                offset : index,
                txt: $('#search-contacts').val()
            },
            dataType: 'json',
            beforeSend: function(){
                $('#image').show();
                $('#load_more_btn').hide();
            },
            complete: function(){
                $('#image').hide();
            },
            success: function (response) {

                var len = response.length;
                var i = 0;
                if(len==0){
                    $('#load_more_btn').hide();
                    $('#error_msg').show();
                }
                else {
                    if(len<20){
                        $('#load_more_btn').hide();
                        $('#error_msg').hide();
                    }else{
                        $('#load_more_btn').show();
                        $('#error_msg').hide();
                    }
                    while (len > i) {
                        $('#img_location').append(
                                '<div class="col-lg-3">' +
                                '<div class="card border-grey border-lighten-2">' +
                                '<div>' +
                                '<div class="archive_action">' +
                                '<button class="img_use btn btn-primary"  link="'+response[i].img+'">إستخدام</button>'+
                                '</div>' +
                                '<img class=""  src="' + baseURL2 + response[i].img + size +  '" />' +
                                '</div>' +
                                '<p class="img-path">' + response[i].img + '</p>' +
                                '<div class="text-xs-center" style="height: 22px; padding-top: 3px; overflow: hidden">' +
                                '<span href="" class="use-img" style="font-size: 10px;">' + response[i].name + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                        );

                        i++;
                    }
                    index = index + 20;
                }
            }
        });


    }

    function load_more2() {

        $('#img_location').empty();

        $.ajax({
            url: baseURL + '/getImages',
            method: 'get',
            data :{
                offset : 0,
                txt: $('#search-contacts').val()
            },
            dataType: 'json',

            beforeSend: function(){
                $('#image').show();
                $('#load_more_btn').hide();
            },
            complete: function(){
                $('#image').hide();
            },
            success: function (response) {

                var len = response.length;
                var i = 0;
                if (len == 0) {
                    $('#load_more_btn').hide();
                    $('#error_msg').show();
                } else {
                    if(len<20){
                        $('#load_more_btn').hide();
                        $('#error_msg').hide();
                    }else{
                        $('#load_more_btn').show();
                        $('#error_msg').hide();
                    }
                    while (len > i) {
                        $('#img_location').append(
                                '<div class="col-lg-3">' +
                                '<div class="card border-grey border-lighten-2">' +
                                '<div>' +
                                '<div class="archive_action">' +
                                '<button class="img_use btn btn-primary"  link="'+response[i].img+'">إستخدام</button>'+
                                '</div>' +
                                '<img class="gallery-thumbnail"  src="' + baseURL2 + response[i].img + size + '" />' +
                                '</div>' +
                                '<p class="img-path">' + response[i].img + '</p>' +
                                '<div class="text-xs-center" style="height: 22px; padding-top: 3px; overflow: hidden">' +
                                '<span href="" class="use-img" style="font-size: 10px;">' + response[i].name + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                        );

                        i++;
                    }


                }
            }

        });
        index=20;
        count=0;

    }

    $('#search-btn').on( "click", function( event ) {
        event.preventDefault();
        load_more2();

    });

    $('#search-contacts').on( "keydown", function( event ) {
        if ( event.which==13) {
            event.preventDefault();
        }
    });

    $('#search-contacts').on( "keyup",function(e) {

        if ( e.which==13){
            e.preventDefault();
            load_more2();

        }

        return false;
    });

</script>