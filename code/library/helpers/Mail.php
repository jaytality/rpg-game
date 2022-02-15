<?php
/**
 * Helper: Mail
 *
 * Helps send email based on .env configurations
 * Currently loads both PHPMailer, or RedBeanPHP for mailing and potential DB updates
 *
 * @author Johnathan Tiong <johnathan.tiong@gmail.com>
 * @copyright 2020 Johnathan Tiong
 *
 */
namespace spark\Helpers;

use \PHPMailer as PHPMailer;
use \R as R;

/**
 * Mail
 *
 * Used as Mail::send(recipient@email.tld, email.subject, message.string)
 */
class Mail
{
    /**
     * send mail
     *
     * @param string $email
     * @param string $subject
     * @param string $body
     * @return bool
     */
    function send($email, $subject, $body)
    {
        $address = isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];

        $mail = new PHPMailer;
        $mail->isSMTP();
        // $mail->SMTPDebug  = 2; // verbose debugging
        $mail->Host       = getConfig('mail.host');
        $mail->SMTPAuth   = true;
        $mail->Username   = getConfig('mail.user');
        $mail->Password   = getConfig('mail.pass');
        $mail->SMTPSecure = 'tls';
        $mail->Port       = getConfig('mail.port');
        $mail->setFrom(getConfig('mail.from'), getConfig('mail.name'));
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if (!$mail->send()) {
            Log::create('Email to [ ' . $email . ' ] has failed: ' . $mail->ErrorInfo);

            return false;
        } else {
            Log::create('Email sent to [ ' . $email . ' ] successfully');

            return true;
        }

        return false;
    }
}
