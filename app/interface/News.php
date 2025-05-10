<?php
interface Newsletter
{
    public function subscribe($user);
}

class CampaignMonitor implements Newsletter
{
    public function subscribe($email)
    {
        return "Subscribe from Campaign monitor {$email}";
    }
}

class Drip implements Newsletter
{
    public function subscribe($email)
    {
        return "Subscribe from Drip {$email}" ;
    }
}

class Sendgrid implements Newsletter
{
    public function subscribe($email)
    {
        return "Subscribe from Sendgrid {$email}";
    }
}

class NewsLetterSubscriptionsController
{
       public $email ;
    public function store(Newsletter $newsletter)
    {
       return $newsletter->subscribe($this->email);
    }
}

$newsletter = new NewsLetterSubscriptionsController();
$campaign= new CampaignMonitor();
$sendgrid = new Sendgrid();
$dDrip = new Drip();
$data = array($campaign, $dDrip, $sendgrid);
foreach ($data as $key =>$dat) {
    $newsletter->email = "abc{$key}@g.com";
    echo $newsletter->store($dat).' - '; //بيستقبل opject
}