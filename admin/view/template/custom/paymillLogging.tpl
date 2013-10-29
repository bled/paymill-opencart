<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $paymillCSS; ?>" />
<div id="content">
    <div class="breadcrumb" align="left">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <div class="box">
        <div class="left"></div>
        <div class="right"></div>
        <div class="heading">
            <h1>
                <img src="view/image/payment.png" alt="payment icon"/>
                <?php echo $headingTitle; ?>
            </h1>
            <div class="buttons">
                <a onclick="$('#paymill_form').submit();" class="button">
                    <span><?php echo $button_delete; ?></span>
                </a>
            </div>
        </div>
        <div class="content">
            <?php var_dump($paymillTotal); ?>
            <form method="POST" action="#" enctype="multipart/form-data" id="paymill_form">
            <table class="list">
                <thead>
                    <tr>
                        <td width="1" style="text-align: center;">
                            <input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);">
                        </td>
                        <td class="left">Datum</td>
                        <td class="left">Identifier</td>
                        <td class="left">Message</td>
                        <td class="left">Debug</td>
                    </tr>
                </thead>
                <?php foreach($paymillEntries as $id => $row){ ?>
                <tr>
                    <td style="text-align: center;">
                        <input type="checkbox" name="selected[]" value="<?php echo $row['id']; ?>">
                    </td>
                    <td class="left"><?php echo $row['date']; ?></td>
                    <td class="left"><?php echo $row['identifier']; ?></td>
                    <td class="left"><?php echo $row['message']; ?></td>
                    <?php if(strlen($row['debug']) > 100){ ?>
                    <td class="left">INSERT SEE MORE LINK HERE</td>
                    <?php }else{ ?>
                    <td><pre><?php echo $row['debug']; ?></pre></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
                </form>
        </div>
    </div>
</div>
<?php echo $footer; ?>