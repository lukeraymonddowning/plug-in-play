<?php

declare(strict_types=1);

namespace PluginPlay;

use Pest\Contracts\Plugins\AddsOutput;
use Pest\Contracts\Plugins\HandlesArguments;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @internal
 */
final class Plugin implements HandlesArguments, AddsOutput
{
    private const QUOTES = [
        "Quality is free, but only to those who are willing to pay heavily for it.",
        "The bitterness of poor quality remains long after the sweetness of low price is forgotten.",
        "Quality is not an act, it is a habit.",
        "Software never was perfect and won't get perfect. But is that a license to create garbage? The missing ingredient is our reluctance to quantify quality.",
        "Geeks are people who love something so much that all the details matter.",
        "Be a yardstick of quality. Some people aren't used to an environment where excellence is expected.",
        "Testers don't like to break things; they like to dispel the illusion that things work.",
    ];

    private const TRY_AGAIN_QUOTES = [
        "A bad break is no excuse for staying stuck where you are.",
        "Defeat will not destroy you, if you do not doubt the power to try again.",
        "Do not give in to defeat, try again.",
        "Failure is not fatal until and unless you give up your next attempt.",
        "Before you doubt yourself, do something. Before you quit, try again. Before you leave, get back in.",
        "The path to success is usually paved with the bricks of failure.",
        "A broken candle still lights, a broken crayon still colors.",
        "If you lose today, try tomorrow, if you lose tomorrow, try one more time, try again and again till you win because that is the only way to win big in your life."
    ];

    public function __construct(private OutputInterface $output)
    {
    }

    public function motivationalQuote(): void
    {
        $randomQuote = self::QUOTES[array_rand(self::QUOTES)];

        $this->output->writeln("\"$randomQuote\"");
    }

    public function handleArguments(array $arguments): array
    {
        $this->motivationalQuote();
        sleep(2);

        return $arguments;
    }

    public function addOutput(int $exitCode): int
    {
        if ($exitCode === 0) {
            return $exitCode;
        }

        $randomQuote = self::TRY_AGAIN_QUOTES[array_rand(self::TRY_AGAIN_QUOTES)];

        $this->output->writeln("\"$randomQuote\"");

        return $exitCode;
    }
}
