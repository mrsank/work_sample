{include file='../layout/header.tpl'}
    <div id="main" class="content" role="main">
    </div>
    <div id="mainFooter">
        <section class="content menu menuEdit">
            <h2>Produkte</h2>
            <ul class="showMenu">
                <li class="nameHeader">Name</li>
                <li class="nameHeader">Kategorien</li>
                <li class="nameHeader">Preis</li>
            </ul>
            {foreach from=$oProductInfo item=oInfo key=key name=loop}
                <ul class="showMenu">
                    <li><span class="name">{$oInfo->name}</span>, {$oInfo->getDescription()}</li>
                    <li><b>{$oInfo->catname}</b></li>
                    <li>{$oInfo->cost} €</li>
                </ul>
            {/foreach}
        </section>
    </div>
{include file='../layout/footer.tpl'}