<?php

// Heading
$_['heading_title'] = 'PAYMILL';
$_['button_viewcart'] = 'Warenkorb anzeigen';

// Entry
$_['entry_status'] = 'Plugin aktiv:';
$_['entry_publickey'] = 'Public Key:';
$_['entry_privatekey'] = 'Private Key:';
$_['entry_sort_order'] = 'Sortier Reihenfolge:';
$_['entry_fast_checkout'] = 'Fast Checkout:';
$_['entry_label'] = 'Label anzeigen:';
$_['entry_logging'] = 'Logging:';
$_['entry_debugging'] = 'Debug:';
$_['entry_buttonSolution'] = 'Buttonlösung(TrustedShops):';

//Text
$_['button_logging'] = 'Logging';
$_['button_search'] = 'Suchen';
$_['text_payment'] = 'Payment';
$_['text_success'] = 'Erfolg: Sie haben ihre PAYMILL Account Details angepasst!';
$_['paymill_accountholder'] = 'Kontoinhaber';
$_['paymill_accountnumber'] = 'Kontonummer';
$_['paymill_banknumber'] = 'Bankleitzahl';

$_['paymill_cardholder'] = 'Kreditkartenbesitzer';
$_['paymill_cardnumber'] = 'Kreditkartennummer';
$_['paymill_cvc'] = 'CVC';
$_['paymill_expirydate'] = 'Gültig bis';

$_['paymill_description'] = "Die mit einem * markierten Felder sind Pflichtfelder.";
$_['paymill_paymilllabel_cc'] = 'Sichere Kreditkartenzahlung';
$_['paymill_paymilllabel_elv'] = 'ELV';

$_['text_payment_paymilldirectdebit_title'] = 'ELV';
$_['text_payment_paymilldirectdebit_detail'] = 'ELV';
$_['text_paymilldirectdebit'] = '<img src="view/image/payment/paymill_logo.jpeg" alt="Paymill" title="Paymill" style="border: 1px solid #EEEEEE; hight:27px; width:96px;" />';


$_['text_payment_paymillcreditcard_title'] = 'Kreditkartenzahlung';
$_['text_payment_paymillcreditcard_detail'] = 'Kreditkartenzahlung';
$_['text_paymillcreditcard'] = '<img src="view/image/payment/paymill_logo.jpeg" alt="Paymill" title="Paymill" style="border: 1px solid #EEEEEE; hight:27px; width:96px;" />';

// Error
$_['error_permission'] = 'Warnung: Sie haben nicht die Rechte PAYMILL anzupassen!';
$_['error_different_amount'] = 'Warning: 3DSecure Toleranz muss eine valide Zahl sein!';
$_['error_missing_publickey'] = 'Warning: Bitte hinterlegen Sie den Publickey!';
$_['error_missing_privatekey'] = 'Warning: Bitte hinterlegen Sie den Privatekey!';

// JavaScript Errormessages
$_['error_javascript'] = array(
    "paymill_card_number" => "Bitte geben Sie eine g&uuml;ltige Kartennummer ein",
    "paymill_card_cvc" => "Bitte geben sie einen g&uuml;ltigen Sicherheitscode ein (R&uuml;ckseite der Karte).",
    "paymill_card_expiry_date" => "Das Ablaufdatum der Karte ist ung&uuml;ltig.",
    "paymill_card_holder" => "Bitte geben Sie den Karteninhaber an.",
    "paymill_accountholder" => "Bitte geben Sie den Kontoinhaber an.",
    "paymill_accountnumber" => "Bitte geben Sie eine g&uuml;ltige Kontonummer ein.",
    "paymill_banknumber" => "Bitte geben Sie eine g&uuml;ltige BLZ ein."
);

//Logging Overview
$_['paymillTableHeadDate'] = "Datum";
$_['paymillTableHeadID'] = "ID";
$_['paymillTableHeadMessage'] = "Nachricht";
$_['paymillTableHeadDebug'] = "Debug Info";
$_['paymillTableHeadDetail'] = "Details";
$_['paymillTableShowDetails'] = "Zeige Details";
$_['paymillCheckboxConnectedSearch'] = "Zusammenh&auml;ngende Suche";