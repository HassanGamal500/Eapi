<?php

namespace App\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{

    public function apiException($request, $e){
        if ($this->isModel($e)) {
            return $this->modelResponse($e);
        }

        if ($this->isHttp($e)) {
            return $this->httpResponse($e);
        }

        return parent::render($request, $e);

    }

    protected function isModel($e){
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e){
        return $e instanceof NotFoundHttpException;
    }

    protected function modelResponse($e){
        return response()->json([
            'Errors' => 'Product Model Not Found'
        ], Response::HTTP_NOT_FOUND);
    }

    protected function httpResponse($e){
        return response()->json([
            'Errors' => 'Incorrect Route'
        ], Response::HTTP_NOT_FOUND);
    }

}

