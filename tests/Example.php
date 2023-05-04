<?php

use function PluginPlay\motivationalQuote;

it('may be accessed on the `$this` closure', function () {
    motivationalQuote();
    expect(true)->toBeTrue();
});

it('may be accessed as function', function () {
    expect('foo')->toBe('bar');
});
