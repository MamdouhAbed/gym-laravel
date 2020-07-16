<div class="izi-modal"
     data-iziModal-fullscreen="true"
     data-iziModal-title="تحرير سريع لبيانات المشترك"
     {{--data-iziModal-icon="la la-fire"--}}
     data-iziModal-padding="20"
     data-iziModal-autoopen="false"
     data-iziModal-headercolor="#4e7ea3"
     id="ajax-product-modal">

    <form class="" id="productForm" name="productForm">
        <input type="hidden" name="players_id" id="players_id">
        <div class="form-group">
            <label>اسم المشترك</label>
            <input type="text"
                   id="name"
                   class="form-control"
                   required=""
                   placeholder="أدخل اسم المشترك"
                   data-validation="required"
                   data-validation-error-msg-required="هذا الحقل مطلوب"
                   name="name">
        </div>
        <div class="form-group">
            <label>رقم سند القبض</label>
            <input type="text"
                   id="bondnumber"
                   class="form-control"
                   name="bondnumber">
        </div>
        @foreach ($paid as $pd)
            <div class="form-group">
                <label class="custom-control custom-radio ks-radio">
                    <input type="radio" id="paid_id{{$pd->id}}" class="custom-control-input paid_id{{$pd->id}}" name="paid_id" value="{{$pd->id}}" >
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">{{$pd->name }}</span>
                </label>
                @if($pd->id==1)
                    <div id="complete">
                        <label>قيمة الدفع:</label>
                        <input type="number" class="form-control paid_value" id="paid_value1" name="paid_value1" >
                        <label class="sh_margin">شيكل</label>
                    </div>
                @endif

                @if($pd->id==2)
                    <div id="part">
                        <label>قيمة الدفع:</label>
                        <input type="number" class="form-control paid_value" id="paid_value2" name="paid_value2">
                        <label class="sh_margin">شيكل</label>

                        <label>باقي حساب:</label>
                        <input type="number" class="form-control paid_value" id="paid_remainder" name="paid_remainder" >
                        <label class="sh_margin">شيكل</label>
                    </div>
                @endif

            </div>
        @endforeach
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
                <input class="form-control flatpickr" id="reg_date" name="reg_date" value="">
            </div>
            <div class="form-group col-lg-6">
                <label>تاريخ انتهاء التسجيل</label>
                <input class="form-control flatpickr" id="reg_end_date" name="reg_end_date" value="">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="btn-save" value="create">حفظ التغييرات</button>
            <button class="btn btn-primary-outline light" data-izimodal-close >إلغاء الأمر</button>
        </div>
    </form>

</div>

<script type="application/javascript">
    @if (session()->has('success'))
                   setTimeout(function () {
        new Noty({
            text: 'تم تعديل بيانات المشترك بنجاح',
            type: 'information',
            theme: 'mint',
            layout: 'topLeft',
            timeout: 3000
        }).show();
    }, 1500);
    @endif
</script>