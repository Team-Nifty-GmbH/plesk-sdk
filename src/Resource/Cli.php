<?php

namespace TeamNifty\Plesk\Resource;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use TeamNifty\Plesk\Requests\Cli\CommandReference;
use TeamNifty\Plesk\Requests\Cli\ExecuteCommand;
use TeamNifty\Plesk\Requests\Cli\ListOfAvailableCommands;

class Cli extends BaseResource
{
    /**
     * @param  string  $id  Command identifier
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function commandReference(string $id): Response
    {
        return $this->connector->send(new CommandReference($id));
    }

    /**
     * @param  string  $id  Command identifier
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function executeCommand(string $id, ?array $params = null, ?array $env = null): Response
    {
        return $this->connector->send(new ExecuteCommand($id, $params, $env));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listOfAvailableCommands(): Response
    {
        return $this->connector->send(new ListOfAvailableCommands());
    }
}
