<?php

namespace Lencse\Application;


class TestMailer implements MailerInterface
{

    /**
     * @var MailProcesserTest
     */
    private $test;

    /**
     * @param MailProcesserTest $test
     */
    public function __construct(MailProcesserTest $test)
    {
        $this->test = $test;
    }

    /**
     * @param string[] $toAdresses
     * @param $subject string
     * @param $body string
     */
    public function send(array $toAdresses, $subject, $body)
    {
        $this->test->setMailData([$toAdresses, $subject, $body]);
    }


}

class MailProcesserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var array
     */
    private $mailData;

    public function testProcess()
    {
        $db = new DemoDB();
        $db->insert([
            'emails' => ['test1@email.hu', 'test2@email.hu'],
            'subject' => 'Subject',
            'body' => 'Body'
        ]);
        $mailer = new DummyMailer();
        $processer = new MailProcesser($mailer, $db);
        $processer->processMails();
        $this->assertEquals([
            [
                ['test1@email.hu', 'test2@email.hu'],
                'Subject',
                'Body'
            ]
        ], $mailer->getMails());
    }

    /**
     * @param array $mailData
     */
    public function setMailData($mailData)
    {
        $this->mailData = $mailData;
    }

}