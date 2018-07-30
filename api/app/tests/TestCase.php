<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\ClientAdapter;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $mailChimp;

    protected function setUp()
    {
        parent::setUp();
        $this->mailChimp = \Mockery::mock('\DrewM\MailChimp\MailChimp');
        $this->app->instance(ClientAdapter::class,
            new ClientAdapter($this->mailChimp));
    }
}
