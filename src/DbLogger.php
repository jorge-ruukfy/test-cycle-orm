<?php

namespace Acme;

use Codedungeon\PHPCliColors\Color;
use Psr\Log\LoggerInterface;

class DbLogger implements LoggerInterface
{
    const emergency = [Color::BG_MAGENTA, Color::BLACK];
    const critical = [Color::BG_RED, Color::CYAN];
    const alert = [Color::LIGHT_YELLOW];
    const error = [Color::LIGHT_RED];
    const warning = [Color::YELLOW];
    const notice = [Color::BROWN];
    const info = [Color::LIGHT_BLUE];
    const debug = [Color::GRAY];
    const log = [Color::WHITE];


    public function emergency($message, array $context = array())
    {
        $this->log('emergency',$message,$context);
    }

    public function alert($message, array $context = array())
    {
        $this->log('alert',$message,$context);
    }

    public function critical($message, array $context = array())
    {
        $this->log('critical',$message,$context);
    }

    public function error($message, array $context = array())
    {
        $this->log('error',$message,$context);
    }

    public function warning($message, array $context = array())
    {
        $this->log('warning',$message,$context);
    }

    public function notice($message, array $context = array())
    {
        $this->log('notice',$message,$context);
    }

    public function info($message, array $context = array())
    {
        $this->log('info',$message,$context);
    }

    public function debug($message, array $context = array())
    {
        $this->log('debug',$message,$context);
    }

    public function log($level, $message, array $context = array())
    {
        $color = implode('',constant(__CLASS__.'::'.$level) ?? self::log);
        printf("%s[%s] %s (%s)%s\n---\n",$color,strtoupper($level),$message,json_encode($context),Color::RESET);
    }
}