<div  id="images-archive"
      class="izi-modal"
      data-iziModal-fullscreen="true"
      data-iziModal-title="أرشيف الصور"
      {{--data-iziModal-icon="la la-fire"--}}
      data-iziModal-padding="20"
      data-iziModal-autoopen="false"
      data-iziModal-headercolor="#4e7ea3">

    <div class="row" id="img_location">

    </div>
    <div id="image">
        <div class="loader"></div>
    </div>
    <div id="error_msg" style="display: none;text-align: center;line-height: 400px;">
        <img class="img-responsive" src="{{asset('admin-assets/images/elements/nofound1.png')}}" alt="لا تتوفر نتائج">
    </div>
    <div style="text-align: center" id="load_more_btn">
        <button class="btn btn-primary" onclick="load_more()" >تحميل المزيد</button>

    </div>
    <style>
        /* SCROLL */

        .iziModal ::-webkit-scrollbar {
            height: 5px;
            width: 5px;
        }
        .iziModal ::-webkit-scrollbar-thumb {
            background-color: #607d8b;
            box-shadow: inset 1px 1px 0 rgba(96,125,138,.1),inset 0 -1px 0 rgba(96,125,138,.07);
        }
        .iziModal ::-webkit-scrollbar-thumb:active {
            background-color: #25628f;
        }
        #images-archive .col-lg-3{
            margin-bottom: 20px;
        }

        .img-path{
            display: none;
        }

        #images-archive .use-img{
            font-size: 12px;
            color: #607d8b;

        }
        .border-grey.border-lighten-2{
            padding: 8px;
            background: #fff;
            border: 1px solid #E0E0E0!important;
        }
        .archive_action{
            position: absolute;
            top: 7px;
            right: 8px;
        }
        .img_use,.img_remove {
            font-size: 10px;
            padding: 0px 7px;
            background: rgba(96, 125, 139, 0.8);
            color: #fff;
            cursor: pointer;
            border: 0;
            border-radius: 0;
            height: 25px;

        }
        .img_use{
            background: rgba(96, 125, 139, 0.8);
            margin-left: 3px;
        }
        .img_remove{
            background: rgba(244, 67, 54, 0.8);
        }
        .loader {
            margin:0 auto;
            border: 5px solid #fff;
            border-radius: 50%;
            border-top: 5px solid #967adc;
            width: 50px;
            height: 50px;
            margin-bottom: 20px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</div>