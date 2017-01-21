<?php

return [
    'title'=>'Akcije',

    'top_add'=>'Dodaj',

    //Table
    'table_code'=>'Šifra',
    'table_name'=>'Naziv',
    'table_status'=>'Status',
    'table_date'=>'Datum',
    'table_starttime'=>'Početak(h)',
    'table_endtime'=>'Kraj(h)',
    'table_location'=>'Lokacija',
    'table_actions'=>'Akcije',
    'table_view'=>'Pregled',
    'table_edit'=>'Uredi',
    'table_markcompleted'=>'Promjena statusa',
    'table_sms'=>'Obavijest SMS-om',
    'table_delete'=>'Izbriši',

    //Delete modal
    'mdelete_title' => 'Brisanje akcije',
    'mdelete_description' => 'Jeste li sigurni da želite izbrisati akciju iz sustava?',
    'mdelete_yes' => 'Da',
    'mdelete_no' => 'Ne',

    //SMS notify modal
    'msms_title' => 'Obavijest SMS-om',
    'msms_description' => 'Obavijestiti sve darivatelje o nadolazećoj akciji SMS-om?',
    'msms_yes' => 'Da',
    'msms_no' => 'Ne',

    //Mark completed modal
    'mstatus_title' => 'Promjena statusa',
    'mstatus_description' => 'Status',
    'mstatus_yes' => 'Ažuriraj',
    'mstatus_no' => 'Zatvori',

    //Question SMS
    'mquestion_title' => 'Upit darivateljima o dolasku',
    'mquestion_description' => 'Obavijestiti darivatelje o nadolazećoj akciji? Jeste li sigurni?',
    'mquestion_yes' => 'Da',
    'mquestion_no' => 'Ne',

    //Donor comming to action modal
    'mcomming_title' => 'Obavijest o dolasku/nedolasku',
    'mcomming_description' => 'Planirate li doći na akciju?',
    'mcomming_yes' => 'Pošalji',
    'mcomming_no' => 'Zatvori',

    'comming_thanks' => 'Hvala Vam na odgovoru!',

    'yes' => 'Da',
    'no' => 'Ne',

    //Form
    'form_code'=>'Šifra',
    'form_name'=>'Naziv',
    'form_status'=>'Status',
    'form_location'=>'Lokacija',
    'form_date'=>'Datum',
    'form_starttime'=>'Početak(h)',
    'form_endtime'=>'Kraj(h)',
    'form_note'=>'Napomena',

    //Add action
    'form_add'=>'Spremi',
    'title_add'=>'Nova akcija',

    //Controller messages
    'added'=>'Akcija je uspješno dodana u sustav!',
    'deleted'=>'Akcija je izbrisana iz sustava!',
    'updated'=>'Akcija je uspješno ažurirana!',
    'status_updated'=>'Status je uspješno ažuriran',
    'donors_notified_success'=>'Darivatelj/i je dodan na listu uspješnih darivanja!',
    'donors_notified_failed'=>'Darivatelj/i je dodan na listu neuspješnih darivanja!',
    'donor_removed'=>'Darivatelj je izbrisan sa liste darivanja!',
    'donor_notselected' => 'Darivatelj nije odabran, pokušajte ponovno.',


    //Remove donor from list modal
    'mremdonor_no' => 'Ne',
    'mremdonor_yes' => 'Da',
    'mremdonor_title' => 'Izbriši sa liste',
    'mremdonor_description' => 'Izbrisati darivatelja sa liste?',

    //Single action
    'single_maininfo'=>'Glavne informacije',
    'single_manage'=>   'Upravljanje darivanjima',
    'single_percentage'=>'Postotak uspješnosti',
    'single_donors_select'=>'Odaberite darivatelje sa liste ili počmite tipkati...',
    'single_managedbutton'=>'Dodaj',
    'single_failedbutton'=>'Dodaj',
    'single_managedtitle'=>'Uspio/li darovati krv na akciji',
    'single_failedtitle'=>'Nije uspio/li darovati krv na akciji',
    'single_comming'=>'Dolaze na akciju',
    'single_not_comming'=>'Ne dolaze na akciju',
    'single_planned_comming' => 'Očekivani odaziv',
    'single_sms_not_sent'=>'SMS nije poslan. Nema darivatelja koji žele SMS kontakt',



    //Single main info box
    'single_info_title'=>'Informacije',
    'single_info_name'=>'Naziv',
    'single_info_date'=>'Datum',
    'single_info_startTime'=>'Početak(h)',
    'single_info_endTime'=>'Kraj(h)',
    'single_info_location'=>'Lokacija',
    'single_info_status'=>'Status',
    'single_info_success_donations'=>'Uspješna darivanja',
    'single_info_failed_donations'=>'Neuspješna darivanja',
    'single_info_failed_note'=>'Napomena',

    'single_table_name'=>'Ime i prezime',
    'single_table_address'=>'Adresa',
    'single_table_actions'=>'Akcije',

    'donor_existsforaction' => 'Darivatelj se već nalazi na listi listi uspješnih ili neuspješnih darivanja',

    'type_incoming' => 'Nadolazeća',
    'type_finished' => 'Završena',

    //Comming button
    'comming_button'=>'Dolazim / Ne dolazim',

    //Options button
    'options_button'=>'Upravljanje',
    'options_notify' => 'Obavijesti darivatelje',
    'options_status' => 'Promjena statusa',
    'options_edit' => 'Uredi akciju',
    'options_delete'=>'Izbriši akciju',
];