<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_TEMPLATE_ID"))
	return;

$templateDir = BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID;
CopyDirFiles(
$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/wizards/ko/vizaglp/site/templates/vizaglp_by_ko/themes/".WIZARD_THEME_ID."/".WIZARD_THEME_ID."css", 
$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/wizards/ko/vizaglp/site/templates/vizaglp_by_ko/".WIZARD_THEME_ID."css");



CopyDirFiles(
	WIZARD_THEME_ABSOLUTE_PATH,
	$_SERVER["DOCUMENT_ROOT"].$templateDir,
	$rewrite = true, 
	$recursive = true,
	$delete_after_copy = false,
	$exclude = "description.php"
);

COption::SetOptionString("main", "wizard_site_logo", WIZARD_SITE_LOGO, "", WIZARD_SITE_ID);
COption::SetOptionString("main", "wizard_".WIZARD_TEMPLATE_ID."_theme_id", WIZARD_THEME_ID, "", WIZARD_SITE_ID);

//Color scheme for main.interface.grid/form
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/".strToLower($GLOBALS["DB"]->type)."/favorites.php");
CUserOptions::SetOption("main.interface", "global", array("theme" => WIZARD_THEME_ID), true);

CWizardUtil::ReplaceMacros($_SERVER["DOCUMENT_ROOT"].$templateDir."/header.php", Array("STYLES" => WIZARD_THEME_ID));
?>