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
                <h3>إضافة مشترك جديد </h3>
            </section>
        </div>

        <div class="content">
            <div class="body content-nav">

                <div class="nav-body">
                    <div class="nav-body-wrapper">
                        <div class="container-fluid">
                            <form  action="{{url('/addplayers')}}" method="post"  enctype="multipart/form-data"/>
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card panel">
                                        <div class="card-block">

                                                <div class="form-group">
                                                    <label>اسم المشترك</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           placeholder="أدخل اسم المشترك"
                                                           data-validation="required"
                                                           data-validation-error-msg-required="يرجى إدخال اسم المشترك"
                                                           value="{{ old('name') }}"
                                                           name="name">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block form-error" style="color: #ef5350;"> {{$errors->first('name')}}</span>
                                                    @endif
                                                </div>

                                            <div class="row">
                                            <div class="form-group col-lg-3">
                                                <style>
                                                    select.form-control:not([size]):not([multiple]){
                                                        padding-top: 5px;
                                                    }
                                                </style>
                                                <label>الجنس</label>
                                                <div class="form-group">
                                                    <select id="cat_players" class="form-control" name="category_id">
{{--                                                        @if(Auth::user()->role==1)--}}
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id }}" {{ (collect(old('category_id'))->contains($category->id)) ? 'selected':'' }}>{{$category->name }} </option>
                                                        @endforeach
                                                        {{--@elseif(Auth::user()->role==2)--}}
                                                            {{--<option value="{{$categories[1]->id }}" {{ (collect(old('category_id'))->contains($categories[1]->id)) ? 'selected':'' }}>{{$categories[1]->name }} </option>--}}
                                                            {{--@endif--}}
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label>الوزن</label>
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{ old('weight') }}"
                                                       name="weight">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label>جوال</label>
                                                <input type="number"
                                                       class="form-control"
                                                       placeholder="مثال: 0599000000"
                                                       data-validation="length"
                                                       value="{{ old('phone') }}"
                                                       data-validation-length="max10"
                                                       data-validation-error-msg-length="لا يجب أن يكون رقم الجوال أطول من 10 أرقام"
                                                       name="phone">
                                            </div>
                                                <div class="form-group col-lg-3">
                                                    <label>رقم سند القبض</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           value="{{ old('bondnumber') }}"
                                                           name="bondnumber">
                                                </div>
                                            </div>
                                            <style>
                                                .rdpaid{
                                                    position: relative;
                                                    margin-bottom: 30px;
                                                }
                                                .rdpaid .form-error{
                                                    position: absolute;
                                                    bottom: -20px;
                                                }
                                                .rdpaid .has-success .custom-control{
                                                    color: inherit;
                                                }
                                                .rdpaid .has-success .form-control{
                                                    border-color: #dedede;
                                                }
                                            </style>
                                            <div class="rdpaid">
                                            @foreach ($paid as $pd)
                                            <div class="form-group">
                                                <label class="custom-control custom-radio ks-radio">
                                                    <input type="radio" class="custom-control-input"
                                                           data-validation="required"
                                                           data-validation-error-msg-required="يرجى اختيار حالة الدفع"
                                                           name="paid_id" value="{{$pd->id }}" >
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">{{$pd->name }}</span>
                                                </label>
                                                @if($pd->id==1)
                                                    <div id="complete" style="display: none">
                                                        <label>قيمة الدفع:</label>
                                                        <input type="number" class="form-control paid_value" name="paid_value1">
                                                        <label class="sh_margin">شيكل</label>
                                                    </div>
                                                @endif

                                                @if($pd->id==2)
                                                <div id="part" style="display: none">
                                                    <label>قيمة الدفع:</label>
                                                    <input type="number" class="form-control paid_value" name="paid_value2">
                                                    <label class="sh_margin">شيكل</label>

                                                    <label>باقي حساب:</label>
                                                    <input type="number" class="form-control paid_value" name="paid_remainder">
                                                    <label class="sh_margin">شيكل</label>
                                                </div>
                                                @endif

                                            </div>
                                            @endforeach
                                            </div>
                                            <script>
                                                $(document.getElementsByName('paid_id')).change(function(){
                                                    var rd = document.getElementsByName('paid_id');
                                                    var x = document.getElementById("complete");
                                                    var y = document.getElementById("part");
                                                        if(rd[0].checked) {
                                                            x.style.display = "inline-block";
                                                            y.style.display = "none";
                                                        }else if(rd[1].checked) {
                                                            x.style.display = "none";
                                                            y.style.display = "inline-block";
                                                        }else if(rd[2].checked) {
                                                            x.style.display = "none";
                                                            y.style.display = "none";
                                                        }

                                                });
                                            </script>


                                            <div class="row">
                                            <div class="form-group col-lg-6">
                                                    <label>تاريخ التسجيل</label>
                                                    <input class="form-control flatpickr" name="reg_date">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                    <label>تاريخ انتهاء التسجيل</label>
                                                    <input class="form-control flatpickr" name="reg_end_date">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                    <label>ملاحظات</label>
                                                    <textarea rows="3" id="maxlength-area" name="notes" class="form-control" >{{ old('notes') }}</textarea>
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
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" value="1" name="activated_id"  checked>
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">تفعيل</span>
                                                    </label>

                                                    @foreach ($level as $lv)
                                                            <label class="custom-control custom-radio ks-radio">
                                                                <input type="radio" class="custom-control-input" name="level_id" value="{{$lv->id }}" >
                                                                <span class="custom-control-indicator"></span>
                                                                <span class="custom-control-description">{{$lv->name }}</span>
                                                            </label>
                                                    @endforeach
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" value= "upload" name="fileSubmit" class="btn btn-primary">إضافة</button>
                                                </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div id="widget-attachments-images-only" class="card panel widget-attachments">
                                        <div class="card-block">
                                            <div class="form-group">
                                                <div class="form-group" style="float:right;margin-left: 20px">

                                                    <label style="margin-left: 7px">صورة المشترك </label>
                                                    <button class="btn btn-primary btn-file">
                                                        <span class="la la-cloud-upload icon"></span>
                                                        <p class="text"  style="max-width: 250px;overflow: hidden;height: 20px;">إختر صورة</p>
                                                        <input type="file" class="img_found"
                                                               onchange="openFile(event)"
                                                               name="img" id="file_image"
                                                               data-validation="mime size dimension"
                                                               data-validation-allowing="jpg, png, gif"
                                                               data-validation-max-size="9048kb"
                                                               data-validation-dimension="min100x100"
                                                               {{--data-validation-error-msg-required="لم يتم تحديد صورة"--}}
                                                               data-validation-error-msg-dimension="أبعاد الصورة غير صحيحة (بحد أدنى 100*100)"
                                                               data-validation-error-msg-size="الملف الذي تحاول تحميله كبير جدًا (بحد أقصى 10 ميغابايت)"
                                                               data-validation-error-msg-mime="لا يُسمح إلا بملفات من نوع jpg , png , jpeg">
                                                    </button>
                                                </div>

                                                <div class="form-group">

                                                    <div class="input-group">
                                                        <input type="text" id="im_ar" readonly="readonly" class="form-control" placeholder="إختيار من الأرشيف" value="" name="img_archive" aria-describedby="button-addon6">
                                                        <span class="input-group-btn" id="button-addon6">
                                                            <button class="btn bg-blue-grey white images-archive" id="archive" data-target="#images-archive" type="button"><i class="icon-plus"></i></button>
                                                            </span>
                                                    </div>
                                                </div>
                                            <div style=" overflow: hidden;">
                                                <img src="{{asset('thumb.php?src=admin-assets/images/elements/img-holder.png&size=465x300')}}"  id="image-select" alt=" ">
                                            </div>
                                        </div>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="1" name="water_img">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">استخدام شعار الجيم</span>
                                            </label>
                                        </div>
                                    </div>






                                </div>
                            </div>
                            </form>


                            @include('cpanel.include.playersArchive')

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
                text: 'تم إضافة المشترك بنجاح',
                type: 'information',
                theme: 'mint',
                layout: 'topLeft',
                timeout: 3000
            }).show();
        }, 1500);
        @endif
    </script>
   @include('cpanel.include.addEditPlayersJS')

@stop

