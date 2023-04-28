<?php

namespace src\lib\response;

class RedirectResponse
{
    /**
     * @param array $messages
     * @param string $location
     * @param bool $isSuccess
     * @param array $queries
     */
    public function __construct(array $messages = [], $location = '', $isSuccess = true, $queries = [])
    {
        if (!empty($messages)){
            $queries[$isSuccess ? 'messages' : 'errorMessages'] = implode(', ', $messages);
        }
        $formattedQueries = http_build_query($queries);
        header("Location: $location" . (strlen($formattedQueries) == 0 ? '' : '?' . $formattedQueries));
        exit();
    }
}