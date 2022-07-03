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


    public function emergency(string|\Stringable $message, array $context = []): void
    {
        $this->log('emergency', $message, $context);
    }

    public function alert(string|\Stringable $message, array $context = []): void
    {
        $this->log('alert', $message, $context);
    }

    public function critical(string|\Stringable $message, array $context = []): void
    {
        $this->log('critical', $message, $context);
    }

    public function error(string|\Stringable $message, array $context = []): void
    {
        $this->log('error', $message, $context);
    }

    public function warning(string|\Stringable $message, array $context = []): void
    {
        $this->log('warning', $message, $context);
    }

    public function notice(string|\Stringable $message, array $context = []): void
    {
        $this->log('notice', $message, $context);
    }

    public function info(string|\Stringable $message, array $context = []): void
    {
        $this->log('info', $message, $context);
    }

    public function debug(string|\Stringable $message, array $context = []): void
    {
        $this->log('debug', $message, $context);
    }

    public function log($level, $message, array $context = []): void
    {
        $color = implode('', constant(__CLASS__ . '::' . $level) ?? self::log);
        printf("%s[%s] %s (%s)%s\n---\n", $color, strtoupper($level), $message, json_encode($context), Color::RESET);
    }
}