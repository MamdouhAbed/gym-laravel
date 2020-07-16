<a href="" @if($players->activated_id!=1||$players->is_delete==1) style="color: darkgray;font-style: italic;" @endif>{{$players->name }}</a>
<br>
<div class="btn_action">
    <a href="{{url('/updateplayers').'/'.$players->id}}" class="text-primary">تحرير</a>
    @if($players->is_delete==0)
    <a href="javascript:void(0);" data-id="{{ $players->id }}" onclick="return update_players('{{$players->id}}');" class="text-secondary update_players" >تحرير سريع</a>
    @endif
    @if($players->activated_id==1&&$players->is_delete==0)<a href="javascript:void(0);"  onclick="return stop_publish('{{$players->id}}');" class="text-muted">تعطيل</a>
    @elseif($players->is_delete!=1)
        <a href="javascript:void(0);"  onclick="return republish('{{$players->id}}');" class="text-muted">تفعيل</a>
    @endif
    {{--<a class="text-warning" href="javascript:void(0);">تثبيت</a>--}}
    @if($players->is_delete==0)
    <a href="javascript:void(0);" class="text-danger btndelete" onclick="return delete_players('{{$players->id}}');">حذف</a>
    @endif
    @if($players->is_delete==1)
    <a href="javascript:void(0);" onclick="return recovery_players('{{$players->id}}');" class="text-secondary recovery_players" >استرجاع</a>
    <a href="javascript:void(0);" class="text-danger btndelete" onclick="return shift_delete('{{$players->id}}');">حذف نهائي</a>
    @endif
</div>