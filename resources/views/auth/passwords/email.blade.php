<!DOCTYPE html>
<html lang="en" data-textdirection="RTL" class="loading">
<head>
    <meta charset="UTF-8">
    <title>{{\App\Settings::first()->name}} - إعادة تعيين كلمة المرور</title>

    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="@if(\App\Settings::first()->img!=null){{asset(\App\Settings::first()->img)}} @else {{asset('uploads/logo/logo-defult.png')}} @endif" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{asset('libs/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('libs/bootstrap/css/bootstrap-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/boraq/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/line-awesome/css/line-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/open-sans/styles.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/dinnext/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libs/tether/css/tether.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/common.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/pages/auth-login.min.css')}}" />
</head>
<body>

<div class="ks-page">

    <div class="ks-body">
        <div class="ks-logo">{{\App\Settings::first()->name}}</div>

        <div class="card panel panel-default light ks-panel ks-forgot-password">
            <div class="card-block">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-container" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h4 class="ks-header">
                        {{ __('هل نسيت كلمة المرور؟') }}
                        <span>{{ __('يرجى إدخال البريد الإلكتروني لإرسال كلمة مرور جديدة') }}</span>
                    </h4>

                    <div class="form-group @error('email') has-error @enderror">
                        <div class="input-icon icon-right icon-lg icon-color-primary">
                            <input id="email" type="email" class="form-control @error('email')error @enderror" @error('email') style="border-color: rgb(185, 74, 72);"@enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="البريد الإلكتروني">
                            <span class="icon-addon">
                            <span class="la la-at"></span>
                        </span>
                        </div>
                        @error('email')
                        <span class="help-block form-error" role="alert">{{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('إرسال') }}
                        </button>
                    </div>
                    <div class="ks-text-center">
                        <span class="text-muted">{{ __('تذكر ذلك؟') }}</span> <a href="{{url('/login')}}">{{ __('الرجوع إلى صفحة الدخول') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('libs/tether/js/tether.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('assets/scripts/common.min.js')}}"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="{{asset('libs/jquery-form-validator/jquery.form-validator.min.js')}}"></script>
<script type="application/javascript">
    (function ($) {
        $(document).ready(function() {
            $.validate({
                modules : 'location, date, security, file',
                onModulesLoaded : function() {

                }
            });
            $('#ks-maxlength-area').restrictLength($('#ks-maxlength-label'));
        });
    })(jQuery);
</script>
</body>
</html>