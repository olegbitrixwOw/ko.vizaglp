<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

//echo "WIZARD_SITE_ID=".WIZARD_SITE_ID." | ";
//echo "WIZARD_SITE_PATH=".WIZARD_SITE_PATH." | ";
//echo "WIZARD_RELATIVE_PATH=".WIZARD_RELATIVE_PATH." | ";
//echo "WIZARD_ABSOLUTE_PATH=".WIZARD_ABSOLUTE_PATH." | ";
//echo "WIZARD_TEMPLATE_ID=".WIZARD_TEMPLATE_ID." | ";
//echo "WIZARD_TEMPLATE_RELATIVE_PATH=".WIZARD_TEMPLATE_RELATIVE_PATH." | ";
//echo "WIZARD_TEMPLATE_ABSOLUTE_PATH=".WIZARD_TEMPLATE_ABSOLUTE_PATH." | ";
//echo "WIZARD_THEME_ID=".WIZARD_THEME_ID." | ";
//echo "WIZARD_THEME_RELATIVE_PATH=".WIZARD_THEME_RELATIVE_PATH." | ";
//echo "WIZARD_THEME_ABSOLUTE_PATH=".WIZARD_THEME_ABSOLUTE_PATH." | ";
//echo "WIZARD_SERVICE_RELATIVE_PATH=".WIZARD_SERVICE_RELATIVE_PATH." | ";
//echo "WIZARD_SERVICE_ABSOLUTE_PATH=".WIZARD_SERVICE_ABSOLUTE_PATH." | ";
//echo "WIZARD_IS_RERUN=".WIZARD_IS_RERUN." | ";
//die();

if (!defined("WIZARD_TEMPLATE_ID"))
	return;



//-форма заказать звонок в футере-->
$em = new CEventMessage;
		$arFields = Array(
			"BODY_TYPE"     => "html",
			"ACTIVE"   => "Y",
			"EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
			"EMAIL_TO" => "#EMAIL_TO#",
			"LID"   => WIZARD_SITE_ID,
			//"SUBJECT" => "Заказ звонка",
			"EVENT_NAME"  => "FEEDBACK_FORM"
		);
		$tempSubj = "Заказ звонка с  сайта #SITE_NAME#";
		$tempText = "Заказ звонка с сайта #SITE_NAME#<br>
------------------------------------------<br>
<br>
На сайте была оставлена заявка Заказать звонок<br>
<br>
Имя: #AUTHOR#<br>
Номер телефона: #AUTHOR_EMAIL#<br>
<br>
<br>
Сообщение сгенерировано автоматически.";
if(SITE_CHARSET=="windows-1251")
{
	$arFields["SUBJECT"] = iconv("UTF-8", "WINDOWS-1251", $tempSubj);
	$arFields["MESSAGE"] = iconv("UTF-8", "WINDOWS-1251", $tempText);
}
else
{
	$arFields["MESSAGE"] = $tempText;
	$arFields["SUBJECT"] = $tempSubj;
}

$event_id = $em->Add($arFields);

CWizardUtil::ReplaceMacros($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID."/footer.php", array("FOOTER_FEEDBACK_FORM_ID" => $event_id));
//CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/about/feedback/index.php", array("FOOTER_FEEDBACK_FORM_ID" => $event_id));



//Форма обратной связи

$em = new CEventMessage;
		$arFields = Array(
			"BODY_TYPE"     => "html",
			"ACTIVE"   => "Y",
			"EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
			"EMAIL_TO" => "#EMAIL_TO#",
			"LID"   => WIZARD_SITE_ID,
			//"SUBJECT" => "Заказ звонка",
			"EVENT_NAME"  => "FEEDBACK_FORM"
		);
		$tempSubj = "Добавлен вопрос с формы обратной связи с  сайта #SITE_NAME#";
		$tempText = "Добавлен вопрос с формы обратной связи с сайта #SITE_NAME#<br>
------------------------------------------<br>
<br>
Добавлен вопрос с формы обратной связи<br>
<br>
Имя: #AUTHOR#<br>
Email: #AUTHOR_EMAIL#<br>
Текст отзыва: #TEXT#<br>
<br>
<br>
Сообщение сгенерировано автоматически.";
if(SITE_CHARSET=="windows-1251")
{
	$arFields["SUBJECT"] = iconv("UTF-8", "WINDOWS-1251", $tempSubj);
	$arFields["MESSAGE"] = iconv("UTF-8", "WINDOWS-1251", $tempText);
}
else
{
	$arFields["MESSAGE"] = $tempText;
	$arFields["SUBJECT"] = $tempSubj;
}

$event_id3 = $em->Add($arFields);

//CWizardUtil::ReplaceMacros($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID."/footer.php", array("ADD_REVIEW_ID" => $event_id3));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/about/feedback/index.php", array("FOOTER_FEEDBACK_FORM_ID" => $event_id3));







//добавление отзывв

$em = new CEventMessage;
		$arFields = Array(
			"BODY_TYPE"     => "html",
			"ACTIVE"   => "Y",
			"EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
			"EMAIL_TO" => "#EMAIL_TO#",
			"LID"   => WIZARD_SITE_ID,
			//"SUBJECT" => "Заказ звонка",
			"EVENT_NAME"  => "FEEDBACK_FORM"
		);
		$tempSubj = "Вызов мастер и заказ звонка с сайта #SITE_NAME#";
		$tempText = "Вызов мастер и заказ звонка с сайта #SITE_NAME#<br>
------------------------------------------<br>
<br>
Вызов мастер и заказ звонка с сайта<br>
<br>
Имя: #AUTHOR#<br>
Телефон: #AUTHOR_EMAIL#<br>
<br>
<br>
Сообщение сгенерировано автоматически.";
if(SITE_CHARSET=="windows-1251")
{
	$arFields["SUBJECT"] = iconv("UTF-8", "WINDOWS-1251", $tempSubj);
	$arFields["MESSAGE"] = iconv("UTF-8", "WINDOWS-1251", $tempText);
}
else
{
	$arFields["MESSAGE"] = $tempText;
	$arFields["SUBJECT"] = $tempSubj;
}

$event_id2 = $em->Add($arFields);

CWizardUtil::ReplaceMacros($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID."/footer.php", array("EVENT_MESSAGE_ID" => $event_id2));
//CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/about/feedback/index.php", array("FOOTER_FEEDBACK_FORM_ID" => $event_id));
?>
