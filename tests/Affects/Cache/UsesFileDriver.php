<?php

declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * Copyright Tenancy for Laravel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/tenancy
 */

namespace Tenancy\Tests\Affects\Cache;

use Tenancy\Affects\Cache\Events\ConfigureCache;

trait UsesFileDriver
{
    protected function registerAffecting()
    {
        $this->events->listen(ConfigureCache::class, function (ConfigureCache $event) {
            $event->config['driver'] = 'file';
            $event->config['path'] = '.tmp'.DIRECTORY_SEPARATOR.$event->event->tenant->getTenantKey();
        });
    }
}
