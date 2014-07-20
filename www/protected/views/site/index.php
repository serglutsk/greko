<script>
    $(document).ready(function () {
        $('#qw').on('click',function(){
            //var w=[];
            var now = new Date()
            var c=parseInt($('#calOneDays').val());
            var d1=$('.selectedDay').eq(0).attr('id');
            var d2=$('.selectedDay').eq(c-1).attr('id');
            var y1=$('.monthYear').eq(0).text();
            var y2=$('.monthYear').eq(1).text();
            var m=$('.monthName').eq(0).text();
            var m2=$('.monthName').eq(1).text();

            var days= d1.split('_');
            var today_day = new Date().getDate();
            var today_year = new Date().getFullYear();

            var today_month = new Date().getMonth() +1;
            if(today_year!=parseInt(y1)  ){
                alert('Неверная дата');
            }else if(today_month > parseInt(days[1])){

                alert('Неверная дата');
            }else if(today_month == parseInt(days[1])   ){
                if(today_day>parseInt(days[2])){
                    alert('Неверная дата');
                }else{


                $.ajax({
                    type:'POST',
                    url: '/index.php?r=site/index',
//                    url: '/ajax/ajax',

                    data:({d1:d1,d2:d2,c:c}),
                    success:function(msg){
                        alert(msg);
                    }
                })
            }
            }

        })
    })
</script>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(!Yii::app()->user->isGuest){?>
<table id="cal">
    <tr>
        <td align=left valign=top style="padding:10px; background:#E3E3E3;">
            <strong>Выберите дни отпуска</strong><br>
            Выберете количество дней
            <select id="calOneDays" onChange="$('#calOne').data('days', $('#calOneDays').val());">
                <?php for($i=1;$i<22;$i++){?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php }?>
            </select>
        </td>
        <!-- <td align=left valign=top style="padding:10px; background:#E3E3E3;">
            <strong>Single Month Demo</strong><br>
            Select Number of Days
            <select id="calTwoDays" onChange="$('#calTwo').data('days', $('#calTwoDays').val());">
                <option value="1">1</option><option value="2" SELECTED>2</option><option value="3">3</option>
                <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                <option value="10">10</option><option value="11">11</option><option value="12">12</option>
            </select>
        </td> -->
    </tr>
    <tr>
        <td align=left id="calOne" valign=top style="padding:10px; background:#E3E3E3;">
            loading calendar one...
        </td>
        <!-- <td align=left id="calTwo" valign=top style="padding:10px; background:#E3E3E3;">
            loading calendar two...
        </td> -->
    </tr>
    <tr>
        <td align=left id="calOneResult" valign=top style="padding:10px; background:#E3E3E3;"></td>
        <!-- <td align=left id="calTwoResult" valign=top style="padding:10px; background:#E3E3E3;"></td> -->
    </tr>
</table>
<input type="button" value='Зберечь' id="qw" style="display:none" >
    Ваши заявки:
    <table>
        <tr>
            <td>Статус</td>
            <td>Дата начала</td>
            <td>Дата окончания</td>
            <td>Количество дней</td>
        </tr>
   <?php foreach($order as $or){?>
       <tr>
           <td><?php if($or->status==0){?>Новая<?php }elseif($or->status==1){?>Принята<?php }else{?>Отклонена<?php }?></td>

           <td><?=$or->start?></td>
           <td><?=$or->finish?></td>
           <td><?=$or->count_day?></td>
       </tr>
        <?php }?>
        </table>
<?php }else{?>

<div class="error">Авторизуйтесь</div>
<?php }?>