<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if ($arResult["NEED_AUTH"] == "Y")
{
	$APPLICATION->AuthForm("");
}
elseif (strlen($arResult["FatalError"])>0)
{
	?>
	<span class='errortext'><?=$arResult["FatalError"]?></span><br /><br />
	<?
}
else
{
	if(strlen($arResult["ErrorMessage"])>0)
	{
		?>
		<span class='errortext'><?=$arResult["ErrorMessage"]?></span><br /><br />
		<?
	}

	if ($arResult["ShowForm"] == "Input")
	{
		?>
		<form method="post" name="form1" action="<?=POST_FORM_ACTION_URI?>" enctype="multipart/form-data">
			<table class="sonet-message-form data-table" cellspacing="0" cellpadding="0">
				<tr>
					<th colspan="2"><?=GetMessage($arResult["Group"]["PROJECT"] == "Y" ? "SONET_C9_SUBTITLE_PROJECT" : "SONET_C9_SUBTITLE")?></th>
				</tr>
				<tr>
					<td valign="top" width="10%" nowrap><?= GetMessage($arResult["Group"]["PROJECT"] == "Y" ? "SONET_C9_GROUP_PROJECT" : "SONET_C9_GROUP") ?>:</td>
					<td valign="top">
						<b><?
						if ($arResult["CurrentUserPerms"]["UserCanSeeGroup"])
							echo "<a href=\"".$arResult["Urls"]["Group"]."\">";
						echo $arResult["Group"]["NAME"];
						if ($arResult["CurrentUserPerms"]["UserCanSeeGroup"])
							echo "</a>";
						?></b>
					</td>
				</tr>
			</table>
			<input type="hidden" name="SONET_GROUP_ID" value="<?= $arResult["Group"]["ID"] ?>">
			<?=bitrix_sessid_post()?>
			<br />
			<input type="submit" name="save" value="<?=GetMessage($arResult["Group"]["PROJECT"] == "Y" ? "SONET_C9_DO_DEL_PROJECT" : "SONET_C9_DO_DEL") ?>">
			<input type="reset" name="cancel" value="<?= GetMessage($arResult["Group"]["PROJECT"] == "Y" ? "SONET_C9_DO_CANCEL_PROJECT" : "SONET_C9_DO_CANCEL") ?>" onclick="window.location='<?= $arResult["Urls"]["Group"] ?>'">
		</form>
		<?
	}
	else
	{
		?>
		<?= GetMessage("SONET_C9_SUCCESS") ?><br><br>
		<?
	}
}
?>