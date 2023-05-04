<?php

declare(strict_types=1);

namespace PluginPlay;

use Pest\Support\Container;

function motivationalQuote(): void
{
    Container::getInstance()->get(Plugin::class)->motivationalQuote();
}
