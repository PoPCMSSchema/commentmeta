<?php

declare(strict_types=1);

namespace PoPCMSSchema\CommentMeta;

use PoP\Root\Module\AbstractModuleConfiguration;
use PoP\Root\Module\EnvironmentValueHelpers;
use PoPSchema\SchemaCommons\Constants\Behaviors;

class ModuleConfiguration extends AbstractModuleConfiguration
{
    /**
     * @return string[]
     */
    public function getCommentMetaEntries(): array
    {
        $envVariable = Environment::COMMENT_META_ENTRIES;
        $defaultValue = [];
        $callback = EnvironmentValueHelpers::commaSeparatedStringToArray(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function getCommentMetaBehavior(): string
    {
        $envVariable = Environment::COMMENT_META_BEHAVIOR;
        $defaultValue = Behaviors::ALLOW;

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
        );
    }

    public function treatCommentMetaKeysAsSensitiveData(): bool
    {
        $envVariable = Environment::TREAT_COMMENT_META_KEYS_AS_SENSITIVE_DATA;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }
}
