<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

$arTypes = Array(
	Array(
		"ID" => "ko_vizaglp",
		"SECTIONS" => "Y",
		"IN_RSS" => "N",
		"SORT" => 1,
		"LANG" => Array(),
	),
	/*Array(
		"ID" => "video",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 2,
		"LANG" => Array(),
	),
	Array(
		"ID" => "clients",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 2,
		"LANG" => Array(),
	),
	
	Array(
		"ID" => "news",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 4,
		"LANG" => Array(),
	),
	Array(
		"ID" => "reviews",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 5,
		"LANG" => Array(),
	),
	Array(
		"ID" => "portfolio",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 6,
		"LANG" => Array(),
	),
	Array(
		"ID" => "sertificates",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 7,
		"LANG" => Array(),
	),
	Array(
		"ID" => "slider",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 8,
		"LANG" => Array(),
	),
	Array(
		"ID" => "employees",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 9,
		"LANG" => Array(),
	),
	Array(
		"ID" => "articles",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 10,
		"LANG" => Array(),
	),
	Array(
		"ID" => "services",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 11,
		"LANG" => Array(),
	),
	Array(
		"ID" => "price",
		"SECTIONS" => "N",
		"IN_RSS" => "N",
		"SORT" => 12,
		"LANG" => Array(),
	),*/

);

$arLanguages = Array();
$rsLanguage = CLanguage::GetList($by, $order, array());
while($arLanguage = $rsLanguage->Fetch())
	$arLanguages[] = $arLanguage["LID"];

$iblockType = new CIBlockType;
foreach($arTypes as $arType)
{
	$dbType = CIBlockType::GetList(Array(),Array("=ID" => $arType["ID"]));
	if($dbType->Fetch())
		continue;

	foreach($arLanguages as $languageID)
	{
		WizardServices::IncludeServiceLang("type.php", $languageID);

		$code = strtoupper($arType["ID"]);
		$arType["LANG"][$languageID]["NAME"] = GetMessage($code."_TYPE_NAME");
		$arType["LANG"][$languageID]["ELEMENT_NAME"] = GetMessage($code."_ELEMENT_NAME");

		if ($arType["SECTIONS"] == "Y")
			$arType["LANG"][$languageID]["SECTION_NAME"] = GetMessage($code."_SECTION_NAME");
	}

	$iblockType->Add($arType);
}
?>