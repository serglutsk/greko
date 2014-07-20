
<script>
    $(document).ready(function() {
        console.log(12);
        $('.fc-event-inner').on('click',function(){
            //alert()

        })
        var currentLangCode = 'en';

        // build the language selector's options
        $.each($.fullCalendar.langs, function(langCode) {
            $('#lang-selector').append(
                $('<option/>')
                    .attr('value', langCode)
                    .prop('selected', langCode == currentLangCode)
                    .text(langCode)
            );
        });

        // rerender the calendar when the selected option changes
        $('#lang-selector').on('change', function() {
            if (this.value) {
                currentLangCode = this.value;
                $('#calendar').fullCalendar('destroy');
                renderCalendar();
            }
        });

        function renderCalendar() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: new Date(),
//                dayClick:  function(){
//                    alert();
//                },
                lang: 'ru',
                buttonIcons: false, // show the prev/next text
                weekNumbers: true,
                editable: true,
                events: [
                    <?php foreach($order as $or){?>
                    {
                       url: '/orders/update/<?=$or->id?>',
                        title: 'Заяква №<?=$or->id?> Пользователь: <?=$or->user->username?>',
                        start: '<?=$or->start?>',
                        end: '<?=$or->finish?>',
                        backgroundColor: <?php if($or['status']==0){?> 'red'<?php }elseif($or['status']==1){?>'blue'<?php }else{?>'grey'<?php }?>,

                    },
                    <?php }?>

                ]
            });
        }

        renderCalendar();
    });


</script>
<?php
/* @var $this OrdersController */
/* @var $dataProvider CActiveDataProvider */
//$a=$order->user;
//var_dump($order[0]->user->username);
$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Create Orders', 'url'=>array('create')),
	array('label'=>'Manage Orders', 'url'=>array('admin')),
);
?>

<h1>Заявки</h1>
<div id='calendar'></div>
<div class="w">
<div class="cub_1"></div><div class="t_1">- Новая заявка </div>
</div>
<div class="w">
<div class="cub_2"></div><div class="t_2">- Приятая заявка </div>
</div>
<div class="w">
<div class="cub_3"></div><div class="t_3">- Отклоненная заявка </div>
</div>
<?php //$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>
