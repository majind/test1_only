<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("template");
?><?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<div class="article-list">
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
        <?php
        $title = htmlspecialcharsbx($arItem["NAME"]);
        $text = htmlspecialcharsbx(strip_tags($arItem["PREVIEW_TEXT"]));
        $link = !empty($arItem["DETAIL_PAGE_URL"])
            ? htmlspecialcharsbx($arItem["DETAIL_PAGE_URL"])
            : "#";

        $image = "";
        if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
            $image = htmlspecialcharsbx($arItem["PREVIEW_PICTURE"]["SRC"]);
        }
        ?>

        <a class="article-item article-list__item" href="<?= $link ?>">
            <?php if ($image !== ""): ?>
                <div class="article-item__background">
                    <img src="<?= $image ?>" alt="" loading="lazy">
                </div>
            <?php endif; ?>

            <div class="article-item__wrapper">
                <div class="article-item__title"><?= $title ?></div>

                <?php if ($text !== ""): ?>
                    <div class="article-item__content"><?= $text ?></div>
                <?php endif; ?>
            </div>
        </a>
    <?php endforeach; ?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>