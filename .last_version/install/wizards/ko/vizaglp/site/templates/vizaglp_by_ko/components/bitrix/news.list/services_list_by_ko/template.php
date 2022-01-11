<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
	<section class="uslugi">
		<div class="center">
			<h2><?=GetMessage("SERVICES_TITLE")?></h2>
			<ul>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


				<li class="animate" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="inset">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>">
						<span class="u1"></span>
						<span class="u2"></span>
						<span class="u3"></span>
						<span class="u4"></span>
						<div class="u_text">
							<span><?echo $arItem["NAME"]?></span>
							<ins><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?></ins>
						</div>
						<div class="u_text_hid">
							 <?echo $arItem["PREVIEW_TEXT"];?>

						</div>
					</div>
				</li>


	
<?endforeach;?>
</ul>
		</div>
	</section>