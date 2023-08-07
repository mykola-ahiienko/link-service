<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Settings;
use App\Models\Link;

class LinkService
{
    /**
     * @param Link $link
     * @return bool
     */
    public function isValid(Link $link): bool
    {
        return !($this->isClicksLimitExceed($link) || $this->isLinkExpire($link));
    }

    /**
     * @param Link $link
     * @return bool
     */
    private function isClicksLimitExceed(Link $link): bool
    {
        return $link->max_clicks > Settings::DEFAULT_CLICKS->value && $link->clicks > $link->max_clicks;
    }

    /**
     * @param Link $link
     * @return bool
     */
    private function isLinkExpire(Link $link): bool
    {
        return $link->expires_at && now() >= $link->expires_at;
    }
}
