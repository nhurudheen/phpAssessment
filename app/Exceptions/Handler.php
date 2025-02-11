<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
/**
* A list of the exception types that are not reported.
*
* @var array<int,string>
*/
protected $dontReport = [
AuthenticationException::class,
];

    /**
     * Report or log an exception.
     *
     * @param Exception|Throwable $exception
     * @return void
     * @throws Throwable
     */
public function report(Exception|Throwable $exception): void
{
parent::report($exception);
}

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception|Throwable $exception
     * @return Response
     * @throws Throwable
     */
public function render($request, Exception|Throwable $exception): Response
{
return parent::render($request, $exception);
}
}
