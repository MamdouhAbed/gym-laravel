@extends('cpanel.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/widgets/upload.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/jquery-confirm/jquery-confirm.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/libs/jquery-confirm/jquery.confirm.min.css')}}">

@stop

@section('content')
    <div class="column page">
        <div class="header">
            <section class="title">
                <h3>إعدادات النظام </h3>
            </section>
        </div>

        <div class="content">
            <div class="body content-nav">

                <div class="nav-body">
                    <div class="nav-body-wrapper">
                        <div class="container-fluid">
                            <form  action="{{url('/updatesettings')}}" method="post"  enctype="multipart/form-data"/>
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card panel">
                                        <div class="card-block">
                                            <div class="form-group">
                                                <label>اسم الجيم</label>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="أدخل اسم الجيم"
                                                       data-validation="required"
                                                       data-validation-error-msg-required="هذا الحقل مطلوب"
                                                       value="{{$settings->name}}"
                                                       name="name">
                                                @if ($errors->has('name'))
                                                    <span class="help-block form-error" style="color: #ef5350;"> {{$errors->first('name')}}</span>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>الاشتراك الشهري للذكور</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           data-validation="required"
                                                           data-validation-error-msg-required="هذا الحقل مطلوب"
                                                           value="{{$settings->male_paid}}"
                                                           name="male_paid">
                                                    @if ($errors->has('male_paid'))
                                                        <span class="help-block form-error" style="color: #ef5350;"> {{$errors->first('male_paid')}}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>الاشتراك الشهري للإناث</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           data-validation="required"
                                                           data-validation-error-msg-required="هذا الحقل مطلوب"
                                                           value="{{$settings->female_paid}}"
                                                           name="female_paid">
                                                    @if ($errors->has('female_paid'))
                                                        <span class="help-block form-error" style="color: #ef5350;"> {{$errors->first('female_paid')}}</span>
                                                    @endif
                                                </div>

                                            </div>

                                            <script>

                                                var openFile = function(file) {
                                                    var input = file.target;

                                                    var reader = new FileReader();
                                                    reader.onload = function(){
                                                        var dataURL = reader.result;
                                                        var output = document.getElementById('image-select');
                                                        output.src = dataURL;
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                };
                                            </script>



                                            <div class="form-group">
                                                <button type="submit" value= "upload" name="fileSubmit" class="btn btn-primary">حفظ</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-4">
                                    <div id="widget-attachments-images-only" class="card panel widget-attachments">
                                        <div class="card-block">
                                            <div class="form-group">
                                                <div class="form-group" style="float:right;margin-left: 20px">

                                                    <label style="margin-left: 7px">شعار الجيم </label>
                                                    <button class="btn btn-primary btn-file">
                                                        <span class="la la-cloud-upload icon"></span>
                                                        <p class="text"  style="max-width: 250px;overflow: hidden;height: 20px;">إختر صورة</p>
                                                        <input type="file" class="img_found"
                                                               onchange="openFile(event)"
                                                               name="img" id="file_image"
                                                               data-validation="required mime size dimension"
                                                               data-validation-allowing="jpg, png, gif"
                                                               data-validation-max-size="9048kb"
                                                               data-validation-dimension="min100x100"
                                                               data-validation-error-msg-required="لم يتم تحديد صورة"
                                                               data-validation-error-msg-dimension="أبعاد الصورة غير صحيحة (بحد أدنى 100*100)"
                                                               data-validation-error-msg-size="الملف الذي تحاول تحميله كبير جدًا (بحد أقصى 10 ميغابايت)"
                                                               data-validation-error-msg-mime="لا يُسمح إلا بملفات من نوع jpg , png , jpeg">
                                                    </button>
                                                </div>

                                                <div class="form-group">
                                                    <div style=" overflow: hidden; width: 100%">
                                                        <img src="@if($settings->img!=null){{asset($settings->img)}} @else {{asset('uploads/logo/logo-defult.png')}} @endif"  id="image-select" alt=" ">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('libs/jquery-form-validator/jquery.form-validator.min.js')}}"></script>
    <script src="{{ asset('assets/scripts/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('assets/scripts/tinymce/index.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/load-image.all.min.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/canvas-to-blob.min.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.iframe-transport.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.fileupload.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.fileupload-process.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.fileupload-image.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.fileupload-audio.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.fileupload-video.js')}}"></script>
    <script src="{{ asset('libs/jquery-file-upload/js/jquery.fileupload-validate.js')}}"></script>
    <script src="{{ asset('libs/jquery-confirm/jquery-confirm.min.js')}}"></script>

    <script type="application/javascript">
        @if (session()->has('success'))
                       setTimeout(function () {
            new Noty({
                text: 'تم التعديل بنجاح',
                type: 'information',
                theme: 'mint',
                layout: 'topLeft',
                timeout: 3000
            }).show();
        }, 1500);
        @endif
    </script>


@stop
