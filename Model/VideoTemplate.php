<?php

namespace QBNK\QBank\API\Model;

class VideoTemplate  implements \JsonSerializable
{
    /**
     * The Video Template identifier.
     * @val int	 */
    protected $id;
    /**
     * The name of the Video Template.
     * @val string	 */
    protected $name;
    /**
     *
     * @val MimeType	 */
    protected $mimeType;
    /**
     * An array of commands for this template.
     * @val Command[]	 */
    protected $commands;

    /**
     * Constructs a VideoTemplate.
     *
     * @param array $parameters An array of parameters to initialize the { @link VideoTemplate } with.
     * - <b>id</b> - The Video Template identifier
     * - <b>name</b> - The name of the Video Template
     * - <b>mimeType</b> -
     * - <b>commands</b> - An array of commands for this template
     */
    public function __construct($parameters = [])
    {
        $this->commands = [];

        if (isset($parameters['id'])) {
            $this->setId($parameters['id']);
        }
        if (isset($parameters['name'])) {
            $this->setName($parameters['name']);
        }
        if (isset($parameters['mimeType'])) {
            $this->setMimeType($parameters['mimeType']);
        }
        if (isset($parameters['commands'])) {
            $this->setCommands($parameters['commands']);
        }
    }

    /**
     * Gets the id of the VideoTemplate.
     * @return int	 */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the "id" of the VideoTemplate.
     *
     * @param int $id
     *
     * @return VideoTemplate
     */
    public function setId($id)
    {
        $this->id =  $id;

        return $this;
    }
    /**
     * Gets the name of the VideoTemplate.
     * @return string	 */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the "name" of the VideoTemplate.
     *
     * @param string $name
     *
     * @return VideoTemplate
     */
    public function setName($name)
    {
        $this->name =  $name;

        return $this;
    }
    /**
     * Gets the mimeType of the VideoTemplate.
     * @return MimeType	 */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Sets the "mimeType" of the VideoTemplate.
     *
     * @param MimeType $mimeType
     *
     * @return VideoTemplate
     */
    public function setMimeType($mimeType)
    {
        if ($mimeType instanceof MimeType) {
            $this->mimeType = $mimeType;
        } elseif (is_array($mimeType)) {
            $this->mimeType = new MimeType($mimeType);
        } else {
            $this->mimeType = null;
            trigger_error('Argument must be an object of class MimeType. Data loss!', E_USER_WARNING);
        }

        return $this;
    }
    /**
     * Gets the commands of the VideoTemplate.
     * @return Command[]	 */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Sets the "commands" of the VideoTemplate.
     *
     * @param Command[] $commands
     *
     * @return VideoTemplate
     */
    public function setCommands($commands)
    {
        if (is_array($commands)) {
            $this->commands = [];
            foreach ($commands as $item) {
                if (!($item instanceof Command)) {
                    if (is_array($item)) {
                        try {
                            $item = new Command($item);
                        } catch (\Exception $e) {
                            trigger_error('Could not auto-instantiate Command. '.$e->getMessage(), E_USER_WARNING);
                        }
                    } else {
                        trigger_error('Array parameter item is not of expected type "Command"!', E_USER_WARNING);
                        continue;
                    }
                }
                $this->commands[] = $item;
            }
        }

        return $this;
    }

    /**
     * Gets all data that should be available in a json representation.
     *
     * @return array An associative array of the available variables.
     */
    public function jsonSerialize()
    {
        $json = [];

        if ($this->id !== null) {
            $json['id'] = $this->id;
        }
        if ($this->name !== null) {
            $json['name'] = $this->name;
        }
        if ($this->mimeType !== null) {
            $json['mimeType'] = $this->mimeType;
        }
        if ($this->commands !== null && !empty($this->commands)) {
            $json['commands'] = $this->commands;
        }

        return $json;
    }
}