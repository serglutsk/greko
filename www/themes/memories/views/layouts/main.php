<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='X-UA-Compatible' content='IE=EmulateIE7' />
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if lt IE 7]>
<style>
#content
{
    height:600px !important;
}
</style>
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css' type='text/css' />
<!--    <script language="JavaScript" type="text/javascript" src="--><?php //echo Yii::app()->baseUrl; ?><!--/js/jquery.js"></script>-->
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.color.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.animate.clip.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/moment.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jCal.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-ui.custom.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/fullcalendar.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/lang-all.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/js/jCal.css">
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->baseUrl; ?><!--/js/fullcalendar.print.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/js/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/js/jquery-ui.min.css">

    <script>
        $(document).ready(function () {

            $('#calOne').jCal({
                day:			new Date(),
//                days:			4,
                showMonths:		2,
                monthSelect:	true,
                //dCheck:			function (day) {
                //		if ( day.getTime() == (new Date('8/7/2008')).getTime() ) return false;
                //		return (day.getDate() != 3);
                //	},
                callback:		function (day, days) {
                    $('#calOneDays').val( days );
                    $(this._target).find('.dInfo').remove();
                    var dCursor = new Date( day.getTime() );
                    for (var di=0; di < days; di++) {
                        var currDay = $(this._target).find('[id*=d_' + ( dCursor.getMonth() + 1 ) + '_' + dCursor.getDate() + '_' + dCursor.getFullYear() + ']');
                        if (currDay.length) currDay.append('<div class="dInfo"><span style="color:#ccc"></span>R</div>');
                        dCursor.setDate( dCursor.getDate() + 1 );
                    }
                    // if calling the function on already selected day(s)
                    if ( typeof $(this._target).data('day') == 'object' &&
                        $(this._target).data('day').getTime() == day.getTime() &&
                        $(this._target).data('days') == days ) {
                        $('#calOneResult').append('<div style="clear:both; font-size:7pt;">' + days + ' days starting ' +
                            ( day.getMonth() + 1 ) + '/' + day.getDate() + '/' + day.getFullYear() + ' RECLICKED</div>');
                    } else {
                        $('#calOneResult').append('<div style="clear:both; font-size:7pt;">' + days + ' days starting ' +
                            ( day.getMonth() + 1 ) + '/' + day.getDate() + '/' + day.getFullYear() + '</div>');
                    }
                    $('#qw').show();
                    return true;
                }
            });
            $('#calTwo').jCal({
                day:			new Date( (new Date()).setMonth( (new Date()).getMonth() + 2 ) ),
                days:			2,
                showMonths:		1,
                monthSelect:	true,
                sDate:			new Date(),
                dCheck:			function (day) {
                    return (day.getDay() != 6);
                },
                callback:		function (day, days) {
                    $('#calTwoDays').val( days );
                    $('#calTwoResult').append('<div style="clear:both; font-size:7pt;">' + days + ' days starting ' +
                        ( day.getMonth() + 1 ) + '/' + day.getDate() + '/' + day.getFullYear() + '</div>');
                    return true;
                }
            });
        });
    </script>

    <style>
        .dInfo {
            font-family:tahoma;
            font-size:7pt;
            color:#fff;
            padding-top:1px;
            padding-bottom:1px;
            background:rgb(0, 102, 153);
        }
        #calendar {
            width: 800px;
            margin: 40px auto;
        }
    </style>

</head>

<body class='wsite-theme-light wsite-page- weeblypage-'>
<div id="wrapper">
        <div id="container">
            <div class="title"><span class='wsite-logo'><table style='height:131px'><tr><td><a href='<?=Yii::app()->homeUrl?>'><span id="wsite-title"><?php echo Yii::app()->name ;?></span></a></td></tr></table></span></div>
            <div id="header" class="wsite-header"></div>

            
            <div id="navigation">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Главная', 'url'=>array('/site/index')),
						array('label'=>'Заявки', 'url'=>array('/orders'),'visible'=>Yii::app()->user->id==1),
//						array('label'=>'Contact', 'url'=>array('/site/contact')),
                        array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Вход"), 'visible'=>Yii::app()->user->isGuest),
                        array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Регистрация"), 'visible'=>Yii::app()->user->isGuest),
                        array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Профиль"), 'visible'=>!Yii::app()->user->isGuest),
                        array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Выход").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
//						array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//						array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
            </div>

            
            <div id="contenttop">
                <div id="contentbtm">
                    <div id="content">
                <div id='wsite-content' class='wsite-not-footer'>
					<?php echo $content; ?>
				</div>

                    <div class="clear"></div>
                    </div>
                </div>        
            </div>
                <div id="footer">
                    <a href='#' target='_blank'><?php echo Yii::app()->name; ?></a> by you
                </div>
			<div class="clear"></div>        
        </div>            
    </div> 

</body>
</html>
