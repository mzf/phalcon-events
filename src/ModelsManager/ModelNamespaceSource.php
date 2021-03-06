<?php

namespace Sid\Phalcon\Events\ModelsManager;

/**
 * Allows you to use models in different namespaces without having to worry about conflicting names.
 *
 * Sid\Models\Posts -> "Sid_Models_Posts"
 */
class ModelNamespaceSource extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @param \Phalcon\Events\Event               $event
     * @param \Phalcon\Mvc\Model\ManagerInterface $modelsManager
     * @param \Phalcon\Mvc\ModelInterface         $model
     */
    public function afterInitialize(\Phalcon\Events\Event $event, \Phalcon\Mvc\Model\ManagerInterface $modelsManager, \Phalcon\Mvc\ModelInterface $model)
    {
        $className = get_class($model);

        $className = str_replace("\\", "_", $className);

        $modelsManager->setModelSource($model, $className);
    }
}
