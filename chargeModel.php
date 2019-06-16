<?php
require '_header.php';
require_once('./config.php');
require_once 'vendor/autoload.php';
require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

// Fonction temporaire pour scan billet
function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

$token = htmlspecialchars($_POST['stripeToken']);
$mail = htmlspecialchars($_SESSION['auth']['email']);
// User Info
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$city = htmlspecialchars($_POST['city']);
$user_info = array(
    "Prénom" => $firstName,
    "Nom" => $lastName,
    "City" => $city
);

$customer = \Stripe\Customer::create(['email' => $mail, 'source' => $token, 'metadata' => $user_info]);

$charge = \Stripe\Charge::create(['customer' => $customer->id, 'amount' => str_replace('.', '', $_GET['total']) , 'currency' => 'eur', 'description' => 'commande de ' . htmlspecialchars($_POST['firstName']) . '  ' .htmlspecialchars( $_POST['lastName']) . '']);
$verif = $db->query('SELECT * FROM customers WHERE mail=:mail', array(
    'mail' => htmlspecialchars($_SESSION['auth']['email'])
));
// Verification si le client existe deja
if ($verif)
{

}

// Mis à jour database client
else
{
    $customers = $db->query('INSERT INTO customers (last_name, first_name, mail, city) VALUES (:lastName,:firstName,:mail,:city)', array(
        'lastName' => htmlspecialchars($_POST['lastName']),
        'firstName' => htmlspecialchars($_POST['firstName']),
        'mail' => htmlspecialchars($_SESSION['auth']['email']),
        'city' => htmlspecialchars($_POST['city'])
    ));
}

$keys = $db->query('SELECT id FROM customers WHERE mail=:mail', array(
    'mail' => htmlspecialchars($_SESSION['auth']['email'])
));


// Mis à jour database des commandes
foreach ($keys as $key)
{
    $commands = $db->query('INSERT INTO commands (id_client,total,commandDate, comment) VALUES (:idClient,:total,NOW(),:comment)', array(
        'idClient' => $key->id,
        'total' => $_GET['total'],
        'comment' => htmlspecialchars($_POST['comment'])
    ));
}
$command = $db->lastInsertId();



            $dateFormat = $db->query('SET lc_time_names = \'fr_FR\'');
            $ids = array_keys($_SESSION['panier']);
            if (empty($ids))
            {
                $prices = array();
            }
            else
            {
                $prices = $db->query('SELECT * FROM prices WHERE id IN (' . implode(',', $ids) . ')');
            }
            foreach ($prices as $price) {
                $events = $db->query('SELECT *, DATE_FORMAT(date, \'%a %d %M %Y\') as dateEvent FROM events WHERE id =:id ', array(
                    'id' => $price->id_event
                ));

                $_SESSION['panier'][$price->id] = (int)$_SESSION['panier'][$price->id];
                if(!isset($billax)){
                    $billax = 0;
                }
                $billax += $_SESSION['panier'][$price->id];
            }




// ****************** CREATION DU PDF ***************************  //

require 'vendor/dompdf/dompdf/src/Dompdf.php';
use Dompdf\Dompdf;
$numBillet = 1;
$dateCommands = $db->query('SELECT * FROM commands WHERE id=:id', array(
    'id' => $command
));


// Generation du billet
for ($i = 0;$i < $billax;$i++) {
    $token = str_random(60);
    $tickets = $db->query('INSERT INTO tickets (confirmation_token,id_command) VALUES (:token,:idCommand)', array(
        'token' => $token,
        'idCommand' => $command

    ));
    foreach ($events as $event) {
        $inscriptions = $db->query('UPDATE eventStats SET inscriptions = inscriptions +1 WHERE event_name=:eventName ', array(
            'eventName' => $event->name

        ));
        $eventTotal = $db->query('UPDATE eventStats SET total = total +:total WHERE event_name=:eventName ', array(
            'total' => $_GET['total'],
            'eventName' => $event->name

        ));


        $idTicket = $db->lastInsertId();
        $data = 'https://billetterie.agencelads.com/scan.php?token=' . $token . '&ticket=' . $idTicket . '';
        $billet = new Dompdf();


        // Contenu du billet
        $html = '';
        $html .= '<html>';
        $html .= '<head>';
        $html .= '	<title></title>';
        $html .= '</head>';
        $html .= '<body>';
        $html .= '';
        $html .= '				<table  class="table table-striped table-sm" width="100%" valign="center" align="center">';
        $html .= '					<tr style="background-color: #333333;">';
        $html .= '						<td style="padding-left:10px; color:white;"><h2>' . $event->name . '</h2></td>';
        $html .= '						<td style="padding-left:10px; color:white;">Commande n° : ' . $command . '</td>';
        $html .= '					</tr>';
        $html .= '              </table>';
        $html .= '				<table  class="table table-striped table-sm" width="100%" valign="center" align="center">';
        $html .= '					<tr style="background-color: #333333;">';
        $html .= '						<td style="padding-left:10px; color:white; background-color:white;"><h2><img src="./img/' . $event->id . '.mini.png" alt="" style="padding-top:15px;"></h2></td>';
        foreach ($dateCommands as $dateCommand) {

            $html .= '						<td style="padding-left:10px; color:#383F54; font-size: 13px; text-align: center; background-color:white;"><strong>DATE ET LIEU</strong><br>' . $event->dateEvent . '<br>' . $event->place . '<br>
						            <strong style="margin-top: 5px;">COMMANDÉ PAR</strong><br>' . htmlspecialchars($_POST['firstName']) . ' ' . htmlspecialchars($_POST['lastName']) . '<br>le : ' . $dateCommand->commandDate . '<br><img alt="" src="' . (new QRCode)->render($data) . '" /></td>';
        }
        $html .= '					</tr>';
        $html .= '              </table>';
        $html .= '	<br>';
        $html .= '	<table class="table table-striped table-sm" width="100%" valign="center" align="center" style="padding-top: 100px;">';
        $html .= '		<tr style="background-color: #333333; " align="center">';
        $html .= '			<td>';
        $html .= '				<h2 style="color:white;">Récapitulatif de commande</h2>';
        $html .= '			</td>';
        $html .= '		</tr>';
        $html .= '	</table>';
        $html .= '	<br>';
        $html .= '	<table  class="table table-striped table-sm" width="100%" valign="center" align="center">';
        $html .= '		<tr>';
        $html .= '			<td>';
        $html .= '				<table  class="table table-striped table-sm" width="100%" valign="center" align="center">';
        $html .= '					<tr style="background-color: #e5e5e5;">';
        $html .= '						<td>Billet</td>';
        $html .= '						<td align="center">Quantité</td>';
        $html .= '					</tr>';
        $html .= '';
        foreach ($prices as $price) {
            $html .= '					<tr>';
            $html .= '						<td>' . $price->name . '</td>';
            $html .= '						<td align="center">' . $_SESSION['panier'][$price->id] . '</td>';
            $html .= '					</tr>';
        }
        $html .= '				</table>';
        $html .= '			</td>';
        $html .= '		</tr>';
        $html .= '	</table>';
        $html .= '	<br>';
        $html .= "<p>CHER UTILISATEUR, <br></p>
    <p style='color: gray; font-size: 15px;'> Ceci est votre billet pour l'événement. Les détenteurs de billets doivent présenter leurs billets à l'entrée, de l'une des manières suivantes. Vous pouvez imprimer le billet ou présenter la version numérique du billet. Vous trouverez tous les détails de cet événement sur notre site. En cas de question ou problème,
    et pour toute question relative à un remboursement, veuillez contacter l'organisateur de l'événement. Si vous ne pouvez pas assister à l'événement,
    veuillez nous contacter. Nous nous réjouissons de vous y voir !</p>";
        $html .= '';
        $html .= '</body>';
        $html .= '</html>';

        $billet->loadHtml($html);

        $billet->setPaper('A4', 'portrait');

        $billet->render();

        $file = $billet->output();

        $createPath = 'agencelajv/billetterie/billet/commande_' . $command . '_' . htmlspecialchars($_POST['lastName']) . '_' . htmlspecialchars($_POST['firstName']) . '';

        $path = 'agencelajv/billetterie/billet/commande_' . $command . '_' . htmlspecialchars($_POST['lastName']) . '_' . htmlspecialchars($_POST['firstName']) . '/billet(' . $numBillet++ . ')_' . $command . '.pdf';
    }
        // Organisation dossier
        if (!file_exists($createPath)) {
            mkdir($createPath);
        }


        file_put_contents($path, $file);


    }


// ****************** ENVOI DU MAIL ***************************  //


    try {
        // Envoi email
        $email = new PHPMailer(true);
        $email->SMTPDebug = 2;
        $email->setFrom('contact@agencelads.com', 'Agence la DS');
        $email->addAddress($mail);
        $numBillet = 1;
        $numClient = 1;
        for ($i = 0; $i < $billax; $i++) {
            // Ajout pièce jointe
            $email->addAttachment($path, 'Billet_' . $numClient++ . '.pdf'); // Optional name

        }

        $email->isHTML(true); // Set email format to HTML
        $email->Subject = 'Votre billet !';
        $email->Body = 'This is the HTML message body <b>in bold!</b>';
        $email->AltBody = 'baba banks';

        $email->send();

    } catch (Exception $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer

    } catch (\Exception $e) {
        echo $e->getMessage();

    }

    $quantity = $_SESSION['panier'];




// Remise a zéro du panier
 $_SESSION['panier'] = 0;