<?php

    $token = "327270820:AAHBMRPtGU5V6koldvG1zvASEs-EjUUMRXQ";
    $website = "https://api.telegram.org/bot".$token;

    $update = file_get_contents('php://input');
    $update = json_decode($update, TRUE);

    $chatId = $update["message"]["chat"]["id"];
    $chatTitle = $update["message"]["chat"]["title"];
    $message = $update['message']['text'];
    $nome = $update['message']['chat']['first_name'];
    $id_message = $update['message']['message_id'];
    $member = $update["message"]["from"]["first_name"];
    $newMember = $update['message']['new_chat_member'];
    $newMemberName = $update['message']['new_chat_member']['first_name'];

    if ($newMember)
    {
        $menssagem = "Olá <b>$newMemberName</b>, seja bem vindo (a) ao grupo <b>$chatTitle</b>. Submeta as regras e divirta-se.";
        msgNoResp($chatId,$menssagem);
    }
    switch ($message)
    {
        case"/chave";
            getKey($chatId);
			break;
		case"/chave@DROIDSU_BOT";
            getKey($chatId);
			break;
        case "/modchave";
            updateKey($chatId);
            break;
        case "/usermod";
            userMod($chatId);
            break;
        case "Ola droidsu";
            saudacao($chatId);
            break;
        case "Olá droidsu";
            saudacao($chatId);
            break;
        case "Oi droidsu";
            saudacao($chatId);
            break;
        case "droidsu";
            saudacao($chatId);
            break;
        case "Droidsu";
            saudacao($chatId);
            break;
        case "DROIDSU";
            saudacao($chatId);
            break;
        case "@DROIDSU_BOT";
            saudacao($chatId);
            break;
        case "OLA DROIDSU";
            saudacao($chatId);
            break;
        case "Ola DROIDSU";
            saudacao($chatId);
            break;
        case "Oi DROIDSU";
            saudacao($chatId);
            break;
        case "Oi Droidsu";
            saudacao($chatId);
            break;
        case "oi Droidsu";
            saudacao($chatId);
            break;
        case "oi droidsu";
            saudacao($chatId);
            break;
        case "Olá Droidsu";
            saudacao($chatId);
            break;
        case "Olá DDROIDSU";
            saudacao($chatId);
            break;
        default;
    }

    function msgResp($chatId,$menssagem)
    {
        $url = "$GLOBALS[website]/sendMessage?chat_id=$chatId&reply_to_message_id=$GLOBALS[id_message]&parse_mode=HTML&text=$menssagem";
        file_get_contents($url);
    }
    function msgNoResp($chatId,$menssagem)
    {
        $url = "$GLOBALS[website]/sendMessage?chat_id=$chatId&parse_mode=HTML&text=$menssagem";
        file_get_contents($url);
    }
        function getKey($chatId)
        {
            if($chatId != -1001074148004 && $chatId != -1001093168990)
            {
                $menssagem = "Desculpe eu sou um Bot exclusivo do grupo <a href='https://t.me/joinchat/Cc-dyEEob15WqeXMW2YYow'>DROIDZONE.</a>";
                msgResp($chatId,$menssagem);
                exit;
            }

            include "key/key.php";
            $menssagem = "A chave é: $realkey";
            msgResp($chatId,$menssagem);
        }
        function updateKey($chatId)
        {
            if($chatId != -1001074148004)
            {	
				if($chatId != -1001093168990)
            {
                $menssagem = "Desculpe eu sou um Bot exclusivo do grupo <a href='https://t.me/joinchat/Cc-dyEEob15WqeXMW2YYow'>DROIDZONE.</a>";
                msgResp($chatId,$menssagem);
                exit;
            }
                $menssagem = "A chave só pode ser modificada no grupo de ADM.";
                msgResp($chatId,$menssagem);
                exit;
            }
            $caracteres = 'DROIDZONE2017';
            $key = substr(str_shuffle($caracteres),0,6);

            $modkey = "<?php $"."realkey = '" .$key ."'; $"."usermod = '" .$GLOBALS[member]."'; ?>";
            require "key/key.php";

            $fp = fopen("key/key.php", "w");
            fwrite($fp, $modkey);
            fclose($fp);
            $alert = "$GLOBALS[website]/sendMessage?chat_id=-1001093168990&parse_mode=HTML&text=A chave foi modificada por <b>$GLOBALS[member]</b>. A nova chave é: $key";
            file_get_contents($alert);
            $menssagem = "Chave atualizada, a nova chave é: <a href='/chave'>$key</a>";
            msgResp($chatId,$menssagem);
        }
        function saudacao($chatId)
        {
            $menssagem = "Olá $GLOBALS[member], eu sou um bot exclusivo do grupo <a href='https://t.me/joinchat/Cc-dyEEob15WqeXMW2YYow'>DROIDZONE.</a>";
            msgResp($chatId,$menssagem);
        }
        function userMod($chatId)
        {
			
            if($chatId != -1001074148004 && $chatId != -1001093168990)
            {
                $menssagem = "Desculpe eu sou um Bot exclusivo do grupo <a href='https://t.me/joinchat/Cc-dyEEob15WqeXMW2YYow'>DROIDZONE.</a>";
                msgResp($chatId,$menssagem);
                exit;
            }
			require "key/key.php";
            $menssagem = "A chave: $realkey foi atribuida por: <b>$usermod</b>";
            msgResp($chatId,$menssagem);
        }


?>