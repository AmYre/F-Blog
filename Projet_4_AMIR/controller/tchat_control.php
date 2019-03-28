<?php

require('../model/tchat_bdd.php');

$tchat_feedback = '';

if ( isset($_POST['tchat_btn']) ) 
{
    $pseudonyme =  htmlspecialchars($_POST['pseudonyme']);
    $mess =  htmlspecialchars($_POST['mess']);

    if ( !empty($pseudonyme) AND !empty($mess) ) 
    {
        
        if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudonyme) ) 
        {
            insert_tchat();
            if ( isset($_POST['pseudonyme']) && isset($_POST['mess']) )
            {
                $tchat_feedback = 'Merci de votre commentaire';
            }

        }else { $tchat_feedback = 'Veuillez entrer un pseudo valide';}
    
    }else { $tchat_feedback = 'Veuillez remplir tous les champs';}

}

require('../view/tchat.php');

?>