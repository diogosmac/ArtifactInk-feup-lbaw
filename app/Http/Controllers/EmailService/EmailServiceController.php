<?php
//require_once('./vendor/autoload.php');

namespace App\Http\Controllers\EmailService;

use App\Http\Controllers\Controller;

class EmailServiceController extends Controller
{


    public function sendRecoverPasswordEmail($email, $name, $url)
    {
        if (!isset($email) || !isset($name) || !isset($link)) {
            return false;
        }
        return;
        // Configure API key authorization: api-key
        $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

        // Uncomment below line to configure authorization using: partner-key
        // $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');

        $apiInstance = new SendinBlue\Client\Api\SMTPApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
        $sendSmtpEmail['sender'] = array('email' => 'general@artifactink.pt', 'name' => 'Artifact Ink');
        $sendSmtpEmail['to'] = array(array('email' => $email, 'name' => $name));
        $sendSmtpEmail['subject'] = 'Reset Password Request';

        $htmlfile = file_get_contents('reset_password.html');
        $htmlContent = sprintf($htmlfile, 'User', $url, $url);

        $sendSmtpEmail['htmlContent'] = $htmlContent;
        $sendSmtpEmail['textContent'] = 'SENDINBLUE AUTO EMAIL';
        $sendSmtpEmail['params'] = array('name' => 'John', 'surname' => 'Doe');
        $sendSmtpEmail['headers'] = array('X-Mailin-custom' => 'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception $e) {
            //echo 'Exception when calling SMTPApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
            return false;
        }

        return true;
    }

    public function sendNewsletterEmail($email) {
    
    }
}
