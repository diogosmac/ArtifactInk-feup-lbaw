<?php

namespace App\Http\Controllers\EmailService;

//require("vendor/autoload.php");

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Item;
use Exception;
use Illuminate\Support\Carbon;


class EmailServiceController extends Controller
{
    public function sendEmail($email, $name, $subject, $content) {
        // Configure API key authorization: api-key
        $config = \SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

        // Uncomment below line to configure authorization using: partner-key
        // $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', 'YOUR_API_KEY');

        $apiInstance = new \SendinBlue\Client\Api\SMTPApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new \GuzzleHttp\Client(),
            $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
        $sendSmtpEmail['sender'] = array('email' => 'general@artifactink.pt', 'name' => 'Artifact Ink');
        $sendSmtpEmail['to'] = array(array('email' => $email/*'tiago.silva.99@hotmail.com'*/, 'name' => $name));
        $sendSmtpEmail['subject'] = $subject;
        
        $sendSmtpEmail['htmlContent'] = $content;
        $sendSmtpEmail['textContent'] = 'SENDINBLUE AUTO EMAIL';
        $sendSmtpEmail['params'] = array('name' => 'John', 'surname' => 'Doe');
        $sendSmtpEmail['headers'] = array('X-Mailin-custom' => 'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception $e) {
            echo 'Exception when calling SMTPApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
            return false;
        }

        return true;
    }

    public function sendRecoverPasswordEmail($email, $name, $url)
    {
        if (!isset($email) || !isset($name) || !isset($url)) {
            return false;
        }

        $content = $this->htmlResetPasswordEmail($name, $url);

        return $this->sendEmail($email, $name, 'Reset Password Request', $content);
    }

    public function sendConfirmResetPasswordEmail($email, $name) {
        if (!isset($email) || !isset($name)) {
            return false;
        }

        $content = $this->htmlConfirmResetPasswordEmail($name);

        return $this->sendEmail($email, $name, 'Reset Password Request', $content);
    }

    /**
     * @param User's email
     * @param User's name 
     * @param Email subject
     * @param Email header
     * @param Email body
     * @param Items to send (List of Item ids)
     * @return HTMLEmail String
     */
    public function sendNewsletterEmail($email, $name, $subject, $header, $body, $items) {
        if (!isset($email) || !isset($items)) {
            return false;
        }

        $content = $this->htmlNewsletterEmail($header, $body, $items);
        
        return $this->sendEmail($email, $name, $subject, $content);
    }


    /**
     * @param Email header
     * @param Email body
     * @param Items to send (List of Item ids)
     * @return HTMLEmail String
     */
    public function htmlNewsletterEmail($header, $body, $items) {
        $paragraphs = $this->newsletterParagraphs($body);
        return "<html>
        <head>
            <title>Artifact Ink</title>
        
            <style>
                body {
                    background-color: #eeeeee;
                    text-align: center;
                }
        
                div.main {
                    margin: auto;
                    margin-top: 1em;
                    max-width: 800px;
                    background-color: white;
                    padding: 2em 0em;
                }
        
                div.content {
                    margin: auto;
                    padding: 0em 1em;
                    font-size: 18px;
                    color: #555555;
                    text-align: start;
                }
        
                div.content p {
                    max-width: 50em;
                }
        
                div.content .highlight {
                    color: black;
                }
        
                div.button-container {
                    padding: 1em; text-align: center;
                }
        
                div.button-container a {
                    color: #F1F1F2;
                }
        
                .button {
                    text-decoration: none;
                    cursor: pointer;
                    border-radius: 0;
                    background-color: #8C4748;
                    color: #F1F1F2;
                    border-color: #8C4748;
                }
        
                .button:hover {
                    background-color: #731F20;
                    color: #F1F1F2;
                    border-color: #731F20;
                }
        
                .button:active,
                .button:focus {
                    background-color: #8C4748;
                    color:  #F1F1F2;
                    border-color: #8C4748;
                    box-shadow: 0 0 0;
                }
        
                .btn {
                    padding: .4rem .5rem;
                    font-size: 1.1rem;
                    line-height: 1.5;
                    border-radius: .25rem;
        
                    display: inline-block;
                    font-weight: 400;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    border: 1px solid transparent;
                    line-height: 1.5;
                    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                }
        
                div.img_container {
                    width: 20em;
                    height: 20em;
                    overflow: hidden;
                }
                
                .image-fit {
                    height: 100%;
                    width: 100%;
                    overflow: hidden;
                    object-fit: contain;
                }
        
                p.trouble {
                    text-align:center; 
                    color: #555555; 
                    margin-top: 3em; 
                    font-size: 14px;
                }
            </style>
        </head>
        
        <body style=\"font-family: Cambria, Cochin, Georgia, Times, serif;\">
            <div class=\"main\">
                <table align=\"center\">
                    <tr>
                      <td style=\"max-width:40em;\">
                        <img src=\"https://web.fe.up.pt/~up201705985/images/artifact_ink_logo_letters.png\" alt=\"Logo\" width=\"400\" style=\"display: block;margin-left: auto;margin-right: auto; padding-bottom: 2em;\">
                        <div class=\"content\">
                            <h3 class=\"highlight\">$header</h3>
                            $paragraphs
                        </div>
                      </td>
                    </tr>
                </table>" . "<table align=\"center\">" . $this->newsletterItems($items) . 
                "<tr>
                    <td style=\"max-width:40em; padding-left: 3em;\">
                    <div class=\"content\">
                    <p>Carefully sent by,<br><br>The Artifact Ink Team</p>
                    </div>
                    </td>
                </tr>
                </table>
                </div></body></html>";
    }

    public function newsletterParagraphs($body) {
        $paragraphs = explode("\n", str_replace("\r", "", $body));
        $content = "";
        foreach ($paragraphs as $paragraph) {
            $content = $content . "<p>$paragraph</p>";
        }
        return $content;        
    }

    /**
     * @param Items to send (List of Item ids)
     * @return HTMLNewsletterItems
     */
    public function newsletterItems($items) {
        if (!isset($items)) {
            return "";
        }
        
        $content = "<tr>";
        for ($i = 0; $i < count($items); $i++) {
            if ($i / 2 > 0 && $i % 2 == 0)
                $content = $content . "</tr><tr>";

            $item = Item::find($items[$i]);
            if (isset($item))
                $content = $content . $this->newsletterItem($item);
        }
            
        $content = $content . "</tr>";
        return $content;
    }

    /**
     * @param Item to send (Item object)
     * @return HTMLNewsletterItem String
     */
    public function newsletterItem($item) {
        if (!isset($item))
            return "";

        $name = $item->name;
        $price = $item->price;
        $sale = $item->sales()->
                whereDate('end', '>=', Carbon::now()->toDateString())->
                whereDate('start', '<=', Carbon::now()->toDateString())->
                get()->first();
        $item_url = route('product', ['id' => $item->id, 'slug' => $item->getSlug()]);
        $item_image_url = "https://web.fe.up.pt/~up201705985/images/img_product/" . $item->images()->first()->link;
        $new_price = null;

        if (isset($sale)) {
            if ($sale->type == "percentage") {
                $new_price = $price * (100 - $sale->percentage_amount);
            }
            else {
                $new_price = $price - $sale->fixed_amount;
            }
            $discount = "<span style=\"text-decoration: line-through;\">
                            <span style=\"color: #c1cad0; text-decoration: line-through;\">$new_price €</span>
                        </span>"; 
        }

        return "<td style=\"max-width:20em; padding: 1.5em; text-align: center;\">
                <p style=\"font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;\">
                    <strong> . $name . </strong>
                </p>
                <div style=\"color:#2d485d; font-family:Montserrat, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;\">
                    <div style=\"line-height: 1.2; font-size: 12px; color: #2d485d; font-family: Montserrat, sans-serif; mso-line-height-alt: 14px;\">
                        <p style=\"font-size: 24px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 29px; margin: 0;\">
                            <span style=\"font-size: 24px;\">
                                <strong>
                                    $discount
                                    <span style=\"color: #8C4748\">$price €</span>
                                </strong>
                            </span>
                        </p>
                    </div>
                </div>
                <div class=\"img_container\">
                    <img class=\"image-fit\" src=\"$item_image_url\" alt=\"\">
                </div>
                <div class=\"button-container\">
                    <a class=\"btn button\" href=\"$item_url\">Get deal</a>
                </div>
            </td>";
    }

    public function htmlResetPasswordEmail($name, $url)
    {
        return "<html>

        <head>
            <title>Artifact Ink</title>
        
            <style>
                body {
                    background-color: #eeeeee;
                    text-align: center;
                }
        
                section.main {
                    margin: auto;
                    margin-top: 1em;
                    max-width: 800px;
                    background-color: white;
                    padding: 2em 0em;
                }
        
                div.content {
                    margin: auto;
                    padding: 0em 1em;
                    font-size: 18px;
                    color: #555555;
                    text-align: start;
                }
        
                div.content .highlight {
                    color: black;
                }
        
                div.button-container {
                    padding: 1em; text-align: center;
                }
        
                div.button-container a {
                    color: #F1F1F2;
                }
        
                .button {
                    text-decoration: none;
                    cursor: pointer;
                    border-radius: 0;
                    background-color: #8C4748;
                    color: #F1F1F2;
                    border-color: #8C4748;
                }
        
                .button:hover {
                    background-color: #731F20;
                    color: #F1F1F2;
                    border-color: #731F20;
                }
        
                .button:active,
                .button:focus {
                    background-color: #8C4748;
                    color:  #F1F1F2;
                    border-color: #8C4748;
                    box-shadow: 0 0 0;
                }
        
                .btn {
                    padding: .5rem 1rem;
                    font-size: 1.25rem;
                    line-height: 1.5;
                    border-radius: .25rem;
        
                    display: inline-block;
                    font-weight: 400;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    border: 1px solid transparent;
                    line-height: 1.5;
                    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                }
        
                p.trouble {
                    text-align:center; 
                    color: #555555; 
                    margin-top: 3em; 
                    font-size: 14px;
                }
            </style>
        </head>
        
        <body style=\"font-family: Cambria, Cochin, Georgia, Times, serif;\">
        <div class=\"main\">
        <table align=\"center\">
            <tr>
              <td style=\"max-width:40em;\">
                <img src=\"https://web.fe.up.pt/~up201705985/images/artifact_ink_logo_letters.png\" alt=\"Logo\" width=\"400\" style=\"display: block;margin-left: auto;margin-right: auto;margin-bottom: 3em;\">
                <div class=\"content\">
                    <h3 class=\"highlight\">Hi " . $name . ",</h3>
                    <p>You recently requested to reset your password for your Artifact Ink account.</p>
                    <p style=\"max-width: 50em; margin: auto;\">Click the button bellow to reset it.</p>
                    <div class=\"button-container\">
                        <a class=\"btn button\" href=\"" . $url . "\">Reset Password</a>
                    </div>
                    <p>If you did not request a password reset, please ignore this email. This password reset is only valid for
                        the next 30 minutes.</p>
                    <p>Thanks,<br>The Artifact Ink Team</p>
                </div>
                <p class=\"trouble\">If you're having trouble clicking the button, please follow this link <br>" . $url . "</p>
              </td>
            </tr>
        </table>
        </div>
        </body>
        </html>";
    }

    public function htmlConfirmResetPasswordEmail($name)
    {
        return "<html>

        <head>
            <title>Artifact Ink</title>
        
            <style>
                body {
                    background-color: #eeeeee;
                    text-align: center;
                }
        
                section.main {
                    margin: auto;
                    margin-top: 1em;
                    max-width: 800px;
                    background-color: white;
                    padding: 2em 0em;
                }
        
                article.content {
                    margin: auto;
                    padding: 0em 1em;
                    font-size: 18px;
                    color: #555555;
                    text-align: start;
                }
        
                article.content .highlight {
                    color: black;
                }
            </style>
        </head>
        
        <body style=\"font-family: Cambria, Cochin, Georgia, Times, serif;\">
        <div class=\"main\">
        <table align=\"center\">
            <tr>
              <td style=\"max-width:40em;\">
                <img src=\"https://web.fe.up.pt/~up201705985/images/artifact_ink_logo_letters.png\" alt=\"Logo\" width=\"400\" style=\"display: block;margin-left: auto;margin-right: auto;margin-bottom: 3em;\">
                <div class=\"content\">
                    <h3 class=\"highlight\">Hi " . $name . ",</h3>
                    <p>The password for your Artifact Ink account has been resetted.</p>
                    <p>Thanks,<br>The Artifact Ink Team</p>
                </div>
              </td>
            </tr>
        </table>
        </div>
        </body>
        </html>";
    }
}
