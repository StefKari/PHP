<?php

interface MailerInterface {
  function send();
}

class SmtpMailer implements MailerInterface {
  public function send() {
    // send an email from smtp
  }
}

class SlackMailer implements MailerInterface {
  public function send() {
    // Send a message from Slack
  }
}

class WelcomeMessage {

  private $mailer;

  public function __construct(MailerInterface $mailer) {
    $this->mailer = $mailer;
  }
}





 ?>
